<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
public function add(Request $request, Product $product)
{
    $quantity = max(1, (int) $request->input('quantity', 1));

    // Cart stored as product_id => quantity
    $cart = session()->get('cart', []);

    $cart[$product->id] = ($cart[$product->id] ?? 0) + $quantity;

    session()->put('cart', $cart);

    return redirect()->back()->with('success', "{$product->name} added to cart!");
}

}
