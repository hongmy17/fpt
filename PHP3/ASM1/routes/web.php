<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\CategoryController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\ProductController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\ProfileController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;

Route::name('client.')->group(function() {
    Route::name('home.')->group(function() {
        Route::get('/', [HomeController::class, 'index'])->name('index');
        Route::get('/about', [HomeController::class, 'about'])->name('about');
    });

    Route::name('product.')->group(function() {
        Route::get('/products', [ProductController::class, 'index'])->name('index');
        Route::get('/products/detail/{id}', [ProductController::class, 'showDetail'])->name('detail');
    });

    Route::name('contact.')->group(function() {
        Route::get('/contact', [ContactController::class, 'contact'])->name('index');
    });

    Route::name('cart.')->group(function() {
        Route::get('/cart', [CartController::class, 'index'])->name('index');
    });

    Route::name('profile.')->group(function() {
        Route::get('/profile', [ProfileController::class, 'index'])->name('index');
    });
});

Route::name('admin.')->group(function() {
    Route::get('/admin', [AdminController::class, 'index'])->name('index');

    Route::name('user.')->group(function() {
        Route::get('/users/add', [UserController::class, 'showAddForm'])->name('add');
        Route::post('/users/store', [UserController::class, 'store'])->name('store');
        Route::get('/users', [UserController::class, 'index'])->name('index');
        Route::get('/users/info/{id}', [UserController::class, 'showInfo'])->name('info');
        Route::get('/users/edit/{id}', [UserController::class, 'showEditForm'])->name('edit');
        Route::post('/users/update/{id}', [UserController::class, 'update'])->name('update');
        Route::delete('/users/delete/{id}', [UserController::class, 'delete'])->name('delete');
    });
});

Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
Route::get('/products/categories/{category_id}', [ProductController::class, 'showProductsByCategoryID'])->name('product.showProductsByCategoryID');
