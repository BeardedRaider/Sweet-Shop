<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Review;

class UserReviewController extends Controller
{
    // Public reviews list with filters
    public function index(Request $request)
    {
        $query = Review::with('user', 'product');

        if ($request->filled('rating')) {
            $query->where('rating', $request->rating);
        }

        if ($request->filled('product_id')) {
            $query->where('product_id', $request->product_id);
        }

        $reviews = $query->latest()->paginate(10)->withQueryString();

        return view('reviews.index', compact('reviews'));
    }

    // Show create form for a given order
    public function create(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        $order->load('items.product');

        return view('reviews.create', compact('order'));
    }

    // Store a new review
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'title'      => 'required|string|max:255',
            'body'       => 'required|string|max:1000',
            'rating'     => 'required|integer|min:1|max:5',
        ]);

        // One review per user/product
        $existing = Auth::user()
            ->reviews()
            ->where('product_id', $validated['product_id'])
            ->first();

        if ($existing) {
            return back()->withErrors(['body' => 'You have already reviewed this product.']);
        }

        $review = new Review($validated);
        $review->user_id = Auth::id();
        $review->save();

        return redirect()
            ->route('account.orders')
            ->with('success', 'Review submitted successfully!');
    }
}
