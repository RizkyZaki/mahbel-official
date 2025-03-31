<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('logout', [AuthController::class, 'logout']);

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticated'])->name('authenticated');
});
Route::prefix('dashboard')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('overview', [DashboardController::class, 'index']);
        Route::resource('about', AboutController::class);
        Route::resource('products', ProductsController::class);
        Route::resource('categories', CategoriesController::class);
        Route::get('settings', [SettingsController::class, 'index']);
        Route::post('settings/contact', [SettingsController::class, 'contact']);
        Route::post('settings/site', [SettingsController::class, 'site']);
    });
});
