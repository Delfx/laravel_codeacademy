<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ProductCategoryResource;
use App\Http\Resources\ProductResource;
use App\Models\ProductCategory;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        return ProductResource::collection(Product::all());
    }
}
