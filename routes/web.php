<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('logout', [AuthController::class, 'logout']);
Route::controller(ClientController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('about/{slug}', 'about');
    Route::get('product/{slug}', 'product');
    Route::get('products', 'products');
    Route::get('category/{slug}', 'category');
    Route::get('categories', 'categories');
    Route::get('contact', 'contact');
    Route::post('contact', 'contactPost');
    Route::post('location', 'location');
    Route::post('carrier', 'carrier');
});
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
        Route::get('contacts', [ContactController::class, 'index']);
        Route::get('contacts/{id}', [ContactController::class, 'show']);
        Route::delete('contacts/{id}', [ContactController::class, 'destroy']);
    });
});
