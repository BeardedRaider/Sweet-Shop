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
use App\Http\Controllers\Admin\AdminOrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| All routes for the application are defined here.
| Grouped by purpose: Authentication, Public, Account, Admin.
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');

// Products
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

// Reviews (public list)
Route::get('/reviews', [UserReviewController::class, 'index'])->name('reviews.index');

// Contact (stub page)
Route::view('/contact', 'stub')->name('contact');

/*
|--------------------------------------------------------------------------
| Account + Orders (Protected by Auth)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    // Account profile
    Route::get('/account', [AccountController::class, 'index'])->name('account');
    Route::put('/account', [AccountController::class, 'update'])->name('account.update');

    // Orders (user history)
    Route::get('/account/orders', [AccountController::class, 'orders'])->name('account.orders');
    Route::get('/account/orders/{order}', [AccountController::class, 'showOrder'])->name('account.orders.show');

    // Reviews (user can create/store reviews)
    Route::get('/reviews/create/{order}', [UserReviewController::class, 'create'])->name('reviews.create');
    Route::post('/reviews', [UserReviewController::class, 'store'])->name('reviews.store');

    // Cart + Checkout
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::post('/checkout', [CartController::class, 'placeOrder'])->name('checkout.place');
});

/*
|--------------------------------------------------------------------------
| Admin Routes (Protected by Admin Middleware)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

    // Products management
    Route::resource('products', ProductController::class);
    Route::delete('products/images/{image}', [ProductController::class, 'deleteImage'])
        ->name('products.images.destroy');

    // Users management
    Route::resource('users', UserController::class);

    // Reviews management
    Route::resource('reviews', ReviewController::class);

    // ✅ Orders management routes
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [AdminOrderController::class, 'show'])->name('orders.show');
    Route::put('/orders/{order}/status', [AdminOrderController::class, 'updateStatus'])->name('orders.updateStatus');
});
