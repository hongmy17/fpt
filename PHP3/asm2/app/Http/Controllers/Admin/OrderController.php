<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        $orders = 
            Order::from('orders as o')
            ->join('users as u', 'u.id', '=', 'o.user_id')
            ->select('o.id as order_id', 'o.is_paid', 'u.id as user_id', 'u.name as user_name', 'u.email as user_email', 'u.avatar as user_avatar')
            ->paginate(5);
        return view("admin.order.index", [
            'orders' => $orders
        ]);
    }

    public function detail($orderID) {
        $orderDetails = 
            OrderDetail::from('order_details as od')
                ->join('products as p', 'p.id', '=', 'od.product_id')
                ->where('order_id', $orderID)
                ->select('p.id as product_id', 'p.title', 'p.thumbnail', 'p.price', 'od.quantity')
                ->get();

        return view("admin.order.detail", [
            'orderDetails' => $orderDetails,
        ]);
    }
}
