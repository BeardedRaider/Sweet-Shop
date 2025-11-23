<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserReviewController;


/*
Web Routes
*/

// Authentication routes
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



// Public routes
    Route::get('/', [HomeController::class, 'index'])->name('home');
    
    Route::get('/products', function () {
        return view('products.index', [
            'products' => Product::all()
        ]);
    })->name('products.index');

    Route::get('/products/{product}', function (Product $product) {
        return view('products.show', [
            'product' => $product
        ]);
    })->name('products.show');
    Route::get('/reviews', [UserReviewController::class, 'index'])->name('reviews.index');    
    Route::view('/contact', 'stub')->name('contact');

    // Account page for logged in users
    Route::get('/account', function () {
        return view('account.index');
    })->name('account');
    // Checkout page for logged in users
    Route::get('/checkout', function () {
        return view('checkout.index');
    })->name('checkout');


// Admin routes
    Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('products', ProductController::class);
    Route::resource('users', UserController::class);
    Route::resource('reviews', ReviewController::class);
});
