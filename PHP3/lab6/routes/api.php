<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;

Route::apiResource('products', ProductController::class);

Route::get('/test', function () {
    return response()->json(['message' => 'API route is working']);
});