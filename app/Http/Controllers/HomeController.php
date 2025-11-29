<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'products' => \App\Models\Product::take(6)->get(),   // 4–6 featured sweets
            'reviews'  => \App\Models\Review::with(['user', 'product'])->latest()->take(4)->get(),
        ]);
    }

}
