<?php

namespace App\Http\Controllers;

use App\Models\OrdersProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderProductController extends Controller
{
    public function show(Request $request)
    {
        $orderProducts = OrdersProduct::get();
        $productNames = [];
        foreach ($orderProducts as $value) {
            $productNames[] = [
                'productName' => Product::where('id', $value['product_id'])->get(),
                "orderProductId" => $value->id
            ];
        }
        return view('ordersProducts.index', compact('productNames'));
    }

    public function store(Request $request)
    {
        $orderProduct = new OrdersProduct();
        $orderProduct->order_id = '1';
        $orderProduct->product_id = $request['id'];
        $orderProduct->save();

        return redirect()->route('index');
    }

    public function deleteOrderProduct($id)
    {
        $orderProduct = OrdersProduct::find($id);
        $orderProduct->delete();

        return redirect()->route('order');
    }
}
