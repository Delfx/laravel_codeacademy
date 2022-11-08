<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductRequest;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function vueProducts(Request $request)
    {
        return view('vue');
    }

    public function index(Request $request)
    {
        $productQuery = Product::query()->where('is_active', true);

        $productCategoryQuery = ProductCategory::query();
        $productCategories = $productCategoryQuery->limit(4)->get();

        if ($request->get('searchField')) {
            $productQuery->where('name', 'LIKE', '%' . $request->get('searchField') . '%');
        }

        if ($request->get('filterByCategories') == 'Filter By Category') {
            $productQuery->get();
        } elseif ($request->get('filterByCategories')) {
            $productQuery->where('category_id', $request->get('filterByCategories'));
        }

        $filersProducts = [
            'Price Up', 'Price Down'
        ];

        if ($request->get('filterByPrice') !== 'Price Up' || $request->get('filterByPrice') !== 'Price Down') {
            $productQuery->get();
        } elseif ($request->get('filterByPrice') == 'Price Up') {
            $productQuery->orderBy('price');
        } elseif ($request->get('filterByPrice') == 'Price+Down') {
            $productQuery->orderBy('price', 'DESC');
        }

        $products = $productQuery->get();

        return view('products.products', compact('products', 'productCategories', 'filersProducts'));
        // return view('vue', compact('products', 'productCategories', 'filersProducts'));
    }

    public function view(Product $product)
    {
        return view('products.viewProduct', compact('product'));
    }

    public function create(ProductCategory $productCategory)
    {
        return view('products.create', compact('productCategory'));
    }

    public function store(ProductRequest $request)
    {

        $request->validated();

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->categories,
            'identifier' => $request->identifier,
            'is_active' => true
        ]);

        return redirect()->route('productView', $product->id);
    }

    public function edit(Request $request, Product $product)
    {
        $productCategoryQuery = ProductCategory::query();
        $productCategories = $productCategoryQuery->limit(4)->get();
        return view('products.update', compact('product', 'productCategories'));
    }

    public function update(ProductRequest $request, $id)
    {

        // $request->validate([
        //     'name' => 'required|max:255',
        //     'description' => 'required',
        //     'categories' => 'required',
        //     'identifier' => 'required',
        // ]);

        $request->validated();

        $productUpdate = Product::find($id);

        $productUpdate->name = $request['name'];
        $productUpdate->description = $request['description'];
        $productUpdate->category_id = $request['categories'];
        $productUpdate->identifier = $request['identifier'];

        $productUpdate->save();

        return redirect()->route('productView', $id);
    }

    public function delete($id)
    {

        $product = Product::find($id);

        $product->delete();

        return redirect()->route('index');
    }
}
