<?php

use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\checkAdmin;
use App\Http\Middleware\CheckOrder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware(checkAdmin::class)->name('home');

Route::name('admin.')->prefix('admin')->group(function () {
    // 100 cái route của admin
})->middleware(checkAdmin::class);

Route::get('order/{idOrder}', [OrderController::class, 'viewOrderDetail']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::name('client.')->group(function(){
    Route::name('contact.')->group(function(){
        Route::get('lien-he', [ContactController::class, 'index'])->name('index');
        Route::post('lien-he', [ContactController::class, 'store'])->name('store');
    });
});
