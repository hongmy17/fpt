<?php

require __DIR__.'/auth.php';

use App\Http\Controllers\Admin\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\ProductController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\ProfileController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryAdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductAdminController;

use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckLogin;

Route::name('client.')->group(function() {
    Route::name('home.')->group(function() {
        Route::get('/', [HomeController::class, 'index'])->name('index');
        Route::get('/about', [HomeController::class, 'about'])->name('about');
    });

    Route::name('product.')->group(function() {
        Route::get('/products', [ProductController::class, 'index'])->name('index');
        Route::get('/products/detail/{id}', [ProductController::class, 'detail'])->name('detail');
        Route::get('/products/category/{id}', [ProductController::class, 'byCategory'])->name('byCategory');
    });
    
    Route::middleware(CheckLogin::class)->group(function() {
        Route::name('cart.')->group(function() {
            Route::get('/cart', [CartController::class, 'index'])->name('index');
            Route::post('/cart/add/{product_id}', [CartController::class, 'add'])->name('add');
            Route::delete('/cart/delete/{order_details_id}', [CartController::class, 'deleteProduct'])->name('delete');
            Route::post('/cart/pay/{order_id}', [CartController::class, 'pay'])->name('pay');
        });
    
        Route::name('profile.')->group(function() {
            Route::get('/profile', [ProfileController::class, 'index'])->name('index');
        });

        Route::name('contact.')->group(function() {
            Route::get('/contact', [ContactController::class, 'index'])->name('index');
            Route::post('/contact', [ContactController::class, 'store'])->name('store');
        });
    });
});

Route::middleware(['auth', CheckAdmin::class])
    ->name('admin.')
    ->group(function() {
        Route::get('/admin', [AdminController::class, 'index'])->name('index');

        Route::name('user.')->group(function() {
            Route::get('/users/add', [UserController::class, 'showAddForm'])->name('add');
            Route::post('/users/store', [UserController::class, 'store'])->name('store');
            Route::get('/users', [UserController::class, 'index'])->name('index');
            Route::get('/users/info/{id}', [UserController::class, 'showInfo'])->name('info');
            Route::get('/users/edit/{id}', [UserController::class, 'showEditForm'])->name('edit');
            Route::put('/users/update/{id}', [UserController::class, 'update'])->name('update');
            Route::delete('/users/delete/{id}', [UserController::class, 'delete'])->name('delete');
        });

        Route::name('product.')->group(function() {
            Route::get('/products/add', [ProductAdminController::class, 'add'])->name('add');
            Route::post('/products/store', [ProductAdminController::class, 'store'])->name('store');
            Route::get('/products', [ProductAdminController::class, 'index'])->name('index');
            Route::get('/products/info/{id}', [ProductAdminController::class, 'info'])->name('info');
            Route::get('/products/edit/{id}', [ProductAdminController::class, 'edit'])->name('edit');
            Route::put('/products/update/{id}', [ProductAdminController::class, 'update'])->name('update');
            Route::delete('/products/delete/{id}', [ProductAdminController::class, 'delete'])->name('delete');
        });

        Route::name('category.')->group(function () {
            Route::get("/categories/add", [CategoryAdminController::class, "add"])->name("add");
            Route::post("/categories/store", [CategoryAdminController::class, "store"])->name("store");
            Route::get("/categories", [CategoryAdminController::class, "index"])->name("index");
            Route::get("/categories/edit/{id}", [CategoryAdminController::class, "edit"])->name("edit");
            Route::put("/categories/update/{id}", [CategoryAdminController::class, "update"])->name("update");
            Route::delete("/categories/delete/{id}", [CategoryAdminController::class, "delete"])->name("delete");
        });

        Route::name('order.')->group(function () {
            Route::get("/orders", [OrderController::class, "index"])->name("index");
            Route::get("/orders/detail/{order_id}", [OrderController::class, "detail"])->name("detail");
        });
    });

