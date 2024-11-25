<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;


Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/auth/login', [LoginController::class, 'loginProses'])->name('auth-login');
    Route::get('/register', [LoginController::class, 'register'])->name('register');
    Route::post('/auth/register', [LoginController::class, 'registerProses'])->name('register-auth');
});

Route::get('/', [ViewController::class, 'home'])->name('home');
Route::get('product/{product}', [ViewController::class, 'product'])->name('product');
Route::get('products/category/{category}', [ViewController::class, 'category'])->name('product-category');

Route::middleware(['auth'])->group(function () {
    Route::middleware(['admin'])->group(function() {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('dashboard/products', [ProductController::class, 'index'])->name('dashboard-products');
        Route::get('dashboard/products/create', [ProductController::class, 'create'])->name('dashboard-products-create');
        Route::post('dashboard/products/store', [ProductController::class, 'store'])->name('dashboard-products-store');
        Route::get('dashboard/products/destroy/{product}', [ProductController::class, 'destroy'])->name('dashboard-products-destroy');
        Route::get('dashboard/products/edit/{product}', [ProductController::class, 'edit'])->name('dashboard-products-edit');
        Route::post('dashboard/products/update/{product}', [ProductController::class, 'update'])->name('dashboard-products-update');
    });
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});