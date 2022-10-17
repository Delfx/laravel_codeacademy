<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showProducts()
    {
        $products = Product::get();

        return view('products.products', ['products' => $products]);
    }
}
