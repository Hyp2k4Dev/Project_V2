<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminDashboardController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\RegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Frontend\HomeFE;

// Frontend routes
Route::get('/', [HomeFE::class, 'index'])->name('frontend.home');

// Authentication routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Admin routes
Route::middleware(['role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/product/add_image', [ProductController::class, 'addImage'])->name('admin.product.add_image');
    Route::match(['get', 'post'], '/admin/product/store', [ProductController::class, 'store'])->name('admin.product.store');
    Route::get('admin/product/{id}/edit', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::put('admin/product/{id}', [ProductController::class, 'update'])->name('admin.product.update');

    // Thêm route cho tính năng xoá sản phẩm
    Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('admin.product.destroy');
});

// User routes
Route::middleware(['role:user'])->prefix('user')->group(function () {
    Route::get('/main', [UserController::class, 'main'])->name('main');
});

// Common routes for both frontend and backend
Route::post('/users', [UserController::class, 'main'])->name('users.main');
Route::get('/product/upload', [ProductController::class, 'index'])->name('product.upload');
Route::post('/product/upload', [ProductController::class, 'store'])->name('product.store');