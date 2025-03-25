<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Models\Categories;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('logout', [AuthController::class, 'logout']);

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
});
Route::prefix('dashboard')->group(function () {
    Route::resource('about', AboutController::class);
    Route::resource('products', ProductsController::class);
    Route::resource('categories', CategoriesController::class);
});
