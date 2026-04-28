<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;

// Auth
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Admin
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController; // Admin products
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\AdminOrderController;

// Public
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController as PublicProductController; // Shop products
use App\Http\Controllers\ContactController;

use App\Http\Controllers\UserReviewController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/register', [RegisterController::class, 'store'])->name('register');

/*
|--------------------------------------------------------------------------
| Public Pages
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');

// Product list
Route::get('/products', [PublicProductController::class, 'index'])->name('products.index');

// Auto-suggest (must be BEFORE /products/{product})
Route::get('/products/suggest', [PublicProductController::class, 'suggest'])
    ->name('products.suggest');

// Product detail
Route::get('/products/{product}', function (Product $product) {
    return view('products.show', ['product' => $product]);
})->name('products.show');

// Public reviews
Route::get('/reviews', [UserReviewController::class, 'index'])->name('reviews.index');

// Review detail
Route::get('/reviews/{review}', [UserReviewController::class, 'show'])->name('reviews.show');

// Contact
Route::get('/contact', function () {
    return view('contact.contact');
})->name('contact');

Route::post('/contact', [ContactController::class, 'submit'])
    ->name('contact.submit');

/*
|--------------------------------------------------------------------------
| User Account (Auth Required)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // Profile
    Route::get('/account', [AccountController::class, 'index'])->name('account');
    Route::put('/account', [AccountController::class, 'update'])->name('account.update');

    // Orders
    Route::get('/account/orders', [AccountController::class, 'orders'])->name('account.orders');
    Route::get('/account/orders/{order}', [AccountController::class, 'showOrder'])->name('account.orders.show');

    // User reviews
    Route::get('/reviews/create/{order}', [UserReviewController::class, 'create'])->name('reviews.create');
    Route::post('/reviews', [UserReviewController::class, 'store'])->name('reviews.store');

    // Cart + Checkout
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::post('/checkout', [CartController::class, 'placeOrder'])->name('checkout.place');
});

/*
|--------------------------------------------------------------------------
| Admin Panel
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

    // Products
    Route::resource('products', ProductController::class);
    Route::delete('products/images/{image}', [ProductController::class, 'deleteImage'])
        ->name('products.images.destroy');

    // Users
    Route::resource('users', UserController::class);

    // Reviews
    Route::resource('reviews', ReviewController::class);

    // Orders
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [AdminOrderController::class, 'show'])->name('orders.show');
    Route::put('/orders/{order}/status', [AdminOrderController::class, 'updateStatus'])->name('orders.updateStatus');
});
