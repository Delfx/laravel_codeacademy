<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



// Route::get('/users', [\App\Http\Controllers\UserController::class, 'showUsers']);
// Route::get('/order', [\App\Http\Controllers\OrderController::class, 'showOrder']);
// Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'contact']);

Route::get('/', [\App\Http\Controllers\ProductController::class, 'index'])->name('index');

Route::get('/create', [\App\Http\Controllers\ProductController::class, 'create']);
Route::post('/store', [\App\Http\Controllers\ProductController::class, 'store']);

Route::get('/products/view/{product}', [\App\Http\Controllers\ProductController::class, 'view'])->name('productView');
Route::get('/{product}/edit', [\App\Http\Controllers\ProductController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [\App\Http\Controllers\ProductController::class, 'update'])->name('update');
Route::get('/product/delete/{id}', [\App\Http\Controllers\ProductController::class, 'delete'])->name('deleteProduct');

Route::get('/orderproduct', [\App\Http\Controllers\OrderProductController::class, 'show'])->name('order');
Route::get('/storeOrders/{id}', [\App\Http\Controllers\OrderProductController::class, 'store'])->name('store');
Route::get('/orderproduct/delete/{id}', [\App\Http\Controllers\OrderProductController::class, 'deleteOrderProduct'])->name('deleteOrderProduct');


require __DIR__ . '/auth.php';
