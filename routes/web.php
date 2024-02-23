<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    Route::get('/product/create', [ProductController::class, 'create'])->name('admin.product.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('admin.product.store');
});

// User routes
Route::middleware(['role:user'])->prefix('user')->group(function () {
    Route::get('/main', [UserController::class, 'main'])->name('main');
});

// Common routes for both frontend and backend
Route::post('/users', [UserController::class, 'main'])->name('users.main'); // Not sure about this route, you may need to adjust it
Route::get('/product/upload', [ProductController::class, 'index']); // Not sure about this route, you may need to adjust it
Route::post('/product/upload', [ProductController::class, 'store']); // Not sure about this route, you may need to adjust it
