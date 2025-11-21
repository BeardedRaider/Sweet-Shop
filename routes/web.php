<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\HomeController;

/*
Web Routes
*/

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

Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');

Route::view('/contact', 'stub')->name('contact');

// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('products', ProductController::class);
    Route::resource('users', UserController::class);
    Route::resource('reviews', ReviewController::class);
});
