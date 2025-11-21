<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        // Fetch all reviews (or limit if you prefer)
        $reviews = Review::latest()->get();

        return view('reviews.index', compact('reviews'));
    }
}
