<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function showOrder()
    {
        $orders = Order::get();
        return view('products.order', ['orders' => $orders]);
    }
}
