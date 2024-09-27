<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AccessoryController;
use App\Http\Controllers\SearchController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/products', [ProductController::class, 'index']);
// Route::get('/products/{id}', [ProductController::class, 'show']);

Route::get('/accessories', [AccessoryController::class, 'index']);

Route::get('/search', [SearchController::class, 'index']);