<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminDashboardController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\RegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Frontend\HomeFE;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\SellerController;
use App\Models\Product;

// Frontend routes
Route::get('/', [HomeFE::class, 'index'])->name('frontend.home');
Route::get('/product', [HomeFE::class, 'product'])->name('frontend.product');
Route::get('/about', [HomeFE::class, 'product'])->name('frontend.product');
Route::get('/blog', [HomeFE::class, 'blog'])->name('frontend.blog');

//order
Route::get('/order', [OrderController::class, 'index'])->name('frontend.order');
Route::post('/order-submit', [OrderController::class, 'createOrder']);

// Authentication routes
Route::get('/login-register', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login-register', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

//Seller routes
Route::middleware(['role:seller'])->prefix('seller')->group(function () {
    Route::get('/seller-dashboard', [SellerController::class, 'index'])->name('seller.dashboard');
});
// Admin routes
Route::middleware(['role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [ProductController::class, 'index'])->name('admin.dashboard');
    Route::get('/userList', [UserController::class, 'userList'])->name('admin.userList');
    // Route::get('/admin/users/{user}/edit', [UserController::class, 'editUser'])->name('admin.editUser');
    Route::get('/admin/users/{user}/edit', [UserController::class, 'showEditForm'])->name('admin.editUserForm');
    Route::put('/admin/users/{user}/edit', [UserController::class, 'editUser'])->name('admin.editUser');



    Route::get('/product/add-product', [ProductController::class, 'addImage'])->name('admin.product.add-product');
    Route::post('/product/store', [ProductController::class, 'store'])->name('admin.product.store');

    Route::get('admin/product/{id}/edit', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::put('admin/product/{id}', [ProductController::class, 'update'])->name('admin.product.update');
    Route::post('/check-product-code', 'ProductController@checkProductCode')->name('admin.product.check_code');
    // Route::get('/analytic', [AdminDashboardController::class, 'index'])->name('admin.analytic');

    // Thêm route cho tính năng xoá sản phẩm
    Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('admin.product.destroy');

    //order
    Route::get("/order-list", [OrderController::class, 'show'])->name('adminorder-list');
});

// User routes
Route::middleware(['role:user'])->prefix('user')->group(function () {
    Route::get('/main', [UserController::class, 'main'])->name('main');
});

// Common routes for both frontend and backend
Route::post('/users', [UserController::class, 'main'])->name('users.main');
Route::get('/product/upload', [ProductController::class, 'index'])->name('product.upload');
Route::post('/product/upload', [ProductController::class, 'store'])->name('product.store');
