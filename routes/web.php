<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
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

Route::redirect('/', 'products/');

Route::resource('products', ProductController::class);

Route::resource('categories', CategoryController::class);

// rota para o carrinho de compra
Route::get('/cart', [CartController::class, 'cartList'])->name('cart');
Route::post('/cart', [CartController::class, 'addCart'])->name('addCart');
Route::post('/cart/remove', [CartController::class, 'cartRemove'])->name('removeCart');
Route::post('/cart/update', [CartController::class, 'cartUpdate'])->name('updateCart');
Route::get('/cart/clear', [CartController::class, 'cartClear'])->name('clearCart');
Route::view('/login', 'login.form')->name('login.form');
Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');
