<?php

use App\Http\Controllers\api\v1\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\ProductCategoryResource;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\ProductCategory;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('v1')->group(function () {
    Route::get('products', [\App\Http\Controllers\api\v1\ProductController::class, 'index']);

    Route::get('products/{name}', function($name){
        return ProductResource::collection(Product::where('is_active', true)->where('name', 'LIKE', "%{$name}%")->get());
    });

    Route::get('productsfilter', [\App\Http\Controllers\api\v1\ProductController::class, 'index']);

    Route::get('productcategory',  function(){
        return ProductCategoryResource::collection(ProductCategory::limit(4)->get());
    });

    Route::get('product/{id}', function($id){
        return ProductResource::collection(Product::where('is_active', true)->where('id', $id)->get());
    });

    Route::post('product/update/{id}', [\App\Http\Controllers\api\v1\ProductController::class, 'update']);
    
    Route::post('product/create', [\App\Http\Controllers\api\v1\ProductController::class, 'create']);

});
