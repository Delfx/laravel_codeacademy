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
            $product->where('name', 'LIKE', "%{$request->get('searchName')}%");
        }

        if ($request->get('category_id')) {
            // dd($request->get('category_id'));
            $product->where('category_id', $request->get('category_id'));
        }

        if ($request->get('productPriceFilter_id')) {

            if ($request->get('productPriceFilter_id') == 1) {
                $product->orderBy('price', 'DESC')->get();
            } else if ($request->get('productPriceFilter_id') == 2) {
                $product->orderBy('price')->get();;
            }
        }

        return ProductResource::collection($product->latest()->get());
    }

    public function update(Request $request, $id){

        $product = Product::find($id);

        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->price = $request->get('price');

        $product->save();

        // dd($product);

    }

    public function create(Request $request)
    {
        $product = Product::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'identifier' => $request->get('identifier'),
            'category_id' => $request->get('category_id'),
            'is_active' => 1


        ]);
    }
}
