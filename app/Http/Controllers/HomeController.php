<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Home controller.
     *
     * Returns the landing page with a small selection of featured products
     * and recent reviews. Kept intentionally small and fast for the homepage.
     */
    public function index()
    {
        return view('home', [
            'products' => \App\Models\Product::take(6)->get(),   // 4–6 featured sweets
            'reviews'  => \App\Models\Review::with(['user', 'product'])->latest()->take(4)->get(),
        ]);
    }

}
