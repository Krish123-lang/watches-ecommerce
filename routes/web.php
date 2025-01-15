<?php

use App\Http\Controllers\WatchController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WatchController::class, 'index'])->name('index');

Route::get('single_product/{id}', [WatchController::class, 'single_product'])->name('single_product');

Route::get('/products/', [WatchController::class, 'products'])->name('products');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');
