<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AdminDashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\Frontend\HomeFE;


// fE
Route::get('/', [HomeFE::class, 'index'])->name('frontend.home');







//be
// Route cho trang chủ
Route::get('/', [HomeController::class, 'index'])->name('home');

// Frontend routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Backend routes (admin)
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    // Admin Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    // Product management
    Route::get('/product/create', [ProductController::class, 'create'])->name('admin.product.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('admin.product.store');
});

// Backend routes (user)
Route::middleware(['auth', 'role:user'])->prefix('user')->group(function () {
    // User Dashboard or Main page
    Route::get('/main', [UserController::class, 'main'])->name('user.main');
});

// Common routes for both frontend and backend
Route::post('/users', [UserController::class, 'main'])->name('users.main'); // Not sure about this route, you may need to adjust it
Route::get('/product/upload', [ProductController::class, 'index']); // Not sure about this route, you may need to adjust it
Route::post('/product/upload', [ProductController::class, 'store']); // Not sure about this route, you may need to adjust it
