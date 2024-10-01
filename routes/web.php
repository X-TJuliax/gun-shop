<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AccessoryController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/products', [ProductController::class, 'index']);
// Route::get('/products/{id}', [ProductController::class, 'show']);

Route::get('/accessories', [AccessoryController::class, 'index']);

Route::get('/search', [SearchController::class, 'index']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/cart/add', [CartController::class, 'addItem']);
Route::get('/cart', [CartController::class, 'getCart'])->name('cart.view');
// Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');


