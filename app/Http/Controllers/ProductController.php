<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $productQuery = Product::query()->where('is_active', true);

        $productCategoryQuery = ProductCategory::query();
        $productCategories = $productCategoryQuery->limit(4)->get();

        if ($request->get('searchField')) {
            $productQuery->where('name', 'LIKE', '%'.$request->get('searchField').'%');
        }

        if ($request->get('filterByCategories') == 'Filter By Category'){
            $productQuery->get();
        }
        elseif ($request->get('filterByCategories')) {
            $productQuery->where('category_id', 'LIKE', '%'.$request->get('filterByCategories').'%');
        }

        $filersProducts = [
           'Price Up', 'Price Down'
        ];

        if($request->get('filterByPrice') == 'Filter by price'){
            $productQuery->get();
        }elseif ($request->get('filterByPrice') == 'Price Up') {
            $productQuery->orderBy('price');
        }elseif ($request->get('filterByPrice') == 'Price Down') {
            $productQuery->orderBy('price', 'DESC');
        }




        $products = $productQuery->get();




        return view('products.products', compact('products', 'productCategories', 'filersProducts'));
    }
}
