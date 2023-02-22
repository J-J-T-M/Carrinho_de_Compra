<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// rotas de produtos
Route::redirect('/', 'products/');
Route::resource('products', ProductController::class);
Route::resource('users', UserController::class);
Route::get('/admin/products', [ProductController::class, 'index2'])->name('admin.products');

// rotas de categorias
Route::resource('categories', CategoryController::class);

// rotas do carrinho de compra
Route::get('/cart', [CartController::class, 'cartList'])->name('cart');
Route::post('/cart', [CartController::class, 'addCart'])->name('addCart');
Route::post('/cart/remove', [CartController::class, 'cartRemove'])->name('removeCart');
Route::post('/cart/update', [CartController::class, 'cartUpdate'])->name('updateCart');
Route::get('/cart/clear', [CartController::class, 'cartClear'])->name('clearCart');

// rotas de login
Route::view('/login', 'login.form')->name('login.form');
Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
Route::get('/register', [LoginController::class, 'create'])->name('login.create');

// rotas do dashboard
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('admin.dashboard');

