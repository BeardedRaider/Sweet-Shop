<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserReviewController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CartController;

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

Route::get('/checkout', function () {
    return view('checkout.index');
})->name('checkout');

// Account + Orders (protected by auth)
Route::middleware('auth')->group(function () {
    Route::get('/account', [AccountController::class, 'index'])->name('account');
    Route::put('/account', [AccountController::class, 'update'])->name('account.update');
    Route::get('/account/orders', [AccountController::class, 'orders'])->name('account.orders');
    Route::get('/account/orders/{order}', [AccountController::class, 'showOrder'])->name('account.orders.show');
    Route::get('/reviews/create/{order}', [UserReviewController::class, 'create'])->name('reviews.create');
    Route::post('/reviews', [UserReviewController::class, 'store'])->name('reviews.store');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])
    ->name('cart.add');
});

// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('products', ProductController::class);
    Route::resource('users', UserController::class);
    Route::resource('reviews', ReviewController::class);

    Route::delete('products/images/{image}', [ProductController::class, 'deleteImage'])
        ->name('products.images.destroy');
});
