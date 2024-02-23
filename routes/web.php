<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AdminDashboardController;
use App\Http\Controllers\Frontend\HomeFE;


// fE
Route::get('/', [HomeFE::class, 'index'])->name('frontend.home');







//be
// Route cho trang chủ
// Route::get('/', [HomeController::class, 'index'])->name('home');

// Route cho đăng nhập và đăng xuất
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route cho đăng ký
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Route cho tạo người dùng mới
Route::post('/users', [UserController::class, 'main'])->name('users.main');

// Route cho trang dashboard của admin, yêu cầu middleware auth và role admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});

// Route cho trang main của user, yêu cầu middleware auth và role user
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/main', [UserController::class, 'main'])->name('main');
});
