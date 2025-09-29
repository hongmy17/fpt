<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TinController;
use App\Http\Controllers\StudentController;

Route::get("/", [TinController::class, "index"]);
Route::get("/contact", [TinController::class, "contact"]);
Route::get("/detail/{id}", [TinController::class, "detail"]);
Route::get("/info", [StudentController::class, "showInfo"]);
