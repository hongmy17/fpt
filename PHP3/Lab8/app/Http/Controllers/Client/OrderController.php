<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function viewOrderDetail($id) {
        $order = Order::findOrFail($id);

        return view('client.account.my-order', [
            'order' => $order
        ]);
    }
}
