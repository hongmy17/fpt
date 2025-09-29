<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, "showAllProducts"]);
Route::get('/new-products', [ProductController::class, "showLatestFiveProducts"]);
Route::get('/detail-product/{id}', [ProductController::class, "showDetailProduct"]);
