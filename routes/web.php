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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/users', [\App\Http\Controllers\UserController::class, 'showUsers']);

Route::get('/products', [\App\Http\Controllers\ProductController::class, 'showProducts']);

Route::get('/order', [\App\Http\Controllers\OrderController::class, 'showOrder']);

require __DIR__ . '/auth.php';
