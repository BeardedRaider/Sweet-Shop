<?php

namespace App\Http\Controllers;

use App\Models\Review;

class UserReviewController extends Controller
{
    public function index()
    {
        // Fetch reviews with product and user relationships
        $reviews = Review::with(['product', 'user'])->latest()->get();

        return view('reviews.index', compact('reviews'));
    }
}
