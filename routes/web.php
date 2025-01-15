<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\WatchController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WatchController::class, 'index'])->name('index');

Route::get('single_product/{id}', [WatchController::class, 'single_product'])->name('single_product');

Route::get('/products/', [WatchController::class, 'products'])->name('products');

Route::get('/cart/', [CartController::class, 'cart'])->name('cart');
Route::post('/add_to_cart/', [CartController::class, 'add_to_cart'])->name('add_to_cart');
Route::get('/add_to_cart/', function () {
    return redirect('/');
});

Route::get('/about', function () {
    return view('about');
})->name('about');
