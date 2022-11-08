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

        $product = Product::where('is_active', true);

        if ($request->get('searchName')) {
            $product->where('name', 'LIKE' ,"%{$request->get('searchName')}%");
        }

        if ($request->get('category_id')) {
            $product->where('category_id', $request->get('category_id'));
        }

        return ProductResource::collection($product->get());

    }
}
