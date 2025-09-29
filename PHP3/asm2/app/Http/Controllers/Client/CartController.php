<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index() {
        $order = Order::firstOrCreate(
            ['user_id' => Auth::user()->id, 'is_paid' => 0]
        );
        $orderDetails = 
            OrderDetail::from('order_details as od')
                ->join('products as p', 'p.id', '=', 'od.product_id')
                ->where('od.order_id', $order->id)
                ->select('p.id as product_id', 'od.id as order_details_id', 'p.title', 'p.price', 'p.thumbnail', 'od.quantity')
                ->get();

        return view ("client.cart.index", [
            'orderDetails' => $orderDetails,    
            'orderID' => $order->id,
        ]);
    }

    public function deleteProduct($orderDetailsID) {
        OrderDetail::findOrFail($orderDetailsID)->delete();

        return
            redirect()
                ->back()
                ->with('success', 'Xóa đơn hàng thành công');
    }

    public function add(Request $request, $productID) {
        $userId = Auth::id();
        $quantity = $request->input('quantity', 1);

        $order = Order::firstOrCreate(
            ['user_id' => $userId, 'is_paid' => 0],
        );

        $orderDetail = 
            OrderDetail::where('order_id', $order->id)
                ->where('product_id', $productID)
                ->first();

        if ($orderDetail) {
            $orderDetail->quantity += $quantity;
            $orderDetail->save();
        } else {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $productID,
                'quantity' => $quantity,
            ]);
        }

        return 
            redirect()
                ->route('client.cart.index')
                ->with('success', 'Thêm sản phẩm vào giỏ hàng thành công');
    }

    public function pay($orderID) {
        $isExist = OrderDetail::where('order_id', $orderID)->exists();
        if (!$isExist) {
            return 
                redirect()
                    ->route('client.cart.index')
                    ->with('error', 'Không có sản phẩm để thanh toán');
        }

        $order = Order::find($orderID);
        $order->is_paid = 1;
        $order->save();

        return 
            redirect()
                ->route('client.cart.index')
                ->with('success', 'Đã thanh toán thành công');
    }
}
