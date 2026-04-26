<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Review;

class UserReviewController extends Controller
{
    /**
     * User-facing review controller.
     *
     * Lets users view reviews, create reviews for orders they own,
     * and submit them. Includes filters for rating and product.
     */
    /**
     * Show all reviews (optional, for /reviews route).
     */
    public function index(Request $request)
    {
        $query = Review::with('user', 'product');

        // Filter by rating if provided
        if ($request->filled('rating')) {
            $query->where('rating', $request->rating);
        }

        // Filter by product if provided
        if ($request->filled('product_id')) {
            $query->where('product_id', $request->product_id);
        }

        // Paginate and keep query string so filters persist
        $reviews = $query->latest()->paginate(10)->withQueryString();

        return view('reviews.index', compact('reviews'));
    }


    /**
     * Show the "create review" form for a given order.
     */
    public function create(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        $order->load('items.product');
        return view('reviews.create', compact('order'));
    }

    /**
     * Store a new review.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'title'      => 'required|string|max:255',
            'body'       => 'required|string|max:1000',
            'rating'     => 'required|integer|min:1|max:5',
        ]);

        // Prevent duplicate reviews per user/product
        $existing = Auth::user()->reviews()->where('product_id', $validated['product_id'])->first();
        if ($existing) {
            return back()->withErrors(['body' => 'You have already reviewed this product.']);
        }

        $review = new Review($validated);
        $review->user_id = Auth::id();
        $review->save();

        return redirect()->route('account.orders')
                 ->with('success', 'Review submitted successfully!');

    }
}
