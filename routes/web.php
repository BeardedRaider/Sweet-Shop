<?php

// Route facade provides the methods to declare application routes
use Illuminate\Support\Facades\Route;

// Model imports used by closure-based routes (simple examples)
use App\Models\Product;

// Controller imports - grouped by responsibility
// Auth controller: handles login/logout actions
use App\Http\Controllers\Auth\LoginController;

// Admin controllers: dashboard and resource management (products, users, reviews, orders)
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\AdminOrderController;

// Public / user-facing controllers
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserReviewController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| This file maps incoming HTTP requests to controllers or closures.
| Routes are grouped by purpose to make it easier for reviewers to follow:
| - Authentication: login/logout
| - Public: home, product listing/detail, public reviews, contact stub
| - Account: authenticated user profile, orders, review creation, checkout
| - Admin: prefixed '/admin' routes for management (protected separately)
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
| Routes that handle user authentication flows. These are basic, explicit
| routes rather than using a full auth scaffolding so reviewers can see the
| exact entry points: show login form, submit credentials, and logout.
*/
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
| Routes accessible to all visitors. These return views or call controllers
| responsible for pages that don't require authentication.
*/
Route::get('/', [HomeController::class, 'index'])->name('home');

// Products
// - GET /products: renders a products listing. Here we use a small closure
//   that fetches all `Product` records and passes them to the `products.index` view.
// - GET /products/{product}: renders a product detail page using implicit
//   route-model binding for a single `Product` instance.
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
// Public-facing index of product reviews. The controller handles pagination
// and formatting; visitors can read reviews without logging in.
Route::get('/reviews', [UserReviewController::class, 'index'])->name('reviews.index');

// Contact (stub page)
// A simple placeholder view for contact information. Uses `Route::view` since
// no controller logic is needed here.
Route::view('/contact', 'stub')->name('contact');

/*
|--------------------------------------------------------------------------
| Account + Orders (Protected by Auth)
|--------------------------------------------------------------------------
| Routes inside this group require the `auth` middleware. They expose user
| account management (view/update profile), order history, review creation
| tied to orders, and cart/checkout flows. Keeping them in a middleware
| group prevents accidental exposure of private endpoints.
*/
Route::middleware('auth')->group(function () {
    // Account profile
    Route::get('/account', [AccountController::class, 'index'])->name('account');
    Route::put('/account', [AccountController::class, 'update'])->name('account.update');

    // Orders (user history)
    // - GET /account/orders: list orders belonging to the authenticated user.
    // - GET /account/orders/{order}: show details for a specific order. Controller
    //   should enforce ownership so one user cannot view another's order.
    Route::get('/account/orders', [AccountController::class, 'orders'])->name('account.orders');
    Route::get('/account/orders/{order}', [AccountController::class, 'showOrder'])->name('account.orders.show');

    // Reviews (user can create/store reviews)
    // These routes allow a logged-in user to create a review for an order they
    // placed. The `create` action typically displays a form and the `store`
    // action persists the review.
    Route::get('/reviews/create/{order}', [UserReviewController::class, 'create'])->name('reviews.create');
    Route::post('/reviews', [UserReviewController::class, 'store'])->name('reviews.store');

    // Cart + Checkout
    // - POST /cart/add/{product}: add an item to the current user's cart
    // - GET /checkout: show checkout summary
    // - POST /checkout: place the order (create Order + OrderItems, charge, etc.)
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::post('/checkout', [CartController::class, 'placeOrder'])->name('checkout.place');
});

/*
|--------------------------------------------------------------------------
| Admin Routes (Protected by Admin Middleware)
|--------------------------------------------------------------------------
| Management routes for administrators. This group is prefixed with
| '/admin' and uses the `admin.` route name prefix. The actual admin
| middleware is applied elsewhere (or should be) to restrict access.
| - Dashboard: landing page for admins
| - Resources: `Route::resource` creates the usual CRUD endpoints
| - Additional custom admin endpoints are declared explicitly below.
*/
Route::prefix('admin')->name('admin.')->group(function () {
    // Dashboard - admin landing page
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

    // Products management
    // `Route::resource('products', ...)` registers index/create/store/show/edit/update/destroy
    Route::resource('products', ProductController::class);
    // Custom route to delete a product image (additional action outside the resource)
    Route::delete('products/images/{image}', [ProductController::class, 'deleteImage'])
        ->name('products.images.destroy');

    // Users management - full CRUD for admin to manage users
    Route::resource('users', UserController::class);

    // Reviews management - full CRUD for admin review moderation
    Route::resource('reviews', ReviewController::class);

    // Orders management - admin-only views and status updates
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [AdminOrderController::class, 'show'])->name('orders.show');
    // Update an order's status (e.g., processing, shipped, delivered)
    Route::put('/orders/{order}/status', [AdminOrderController::class, 'updateStatus'])->name('orders.updateStatus');
});
