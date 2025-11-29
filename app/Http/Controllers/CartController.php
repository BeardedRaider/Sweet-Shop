<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function add(Request $request, Product $product)
    {
        $quantity = max(1, (int) $request->input('quantity', 1));

        $cart = session()->get('cart', []);

        // Store as integers: product_id => quantity
        $cart[$product->id] = ($cart[$product->id] ?? 0) + $quantity;

        session()->put('cart', $cart);

        return redirect()->back()->with('success', "{$product->name} added to cart!");
    }

    public function checkout()
    {
        $cart = session('cart', []);
        $items = [];
        $total = 0;

        foreach ($cart as $id => $quantity) {
            $product = Product::find($id);
            if ($product && $quantity > 0) {
                $lineTotal = $product->price * $quantity;
                $items[] = [
                    'product'   => $product,
                    'quantity'  => $quantity,
                    'lineTotal' => $lineTotal,
                ];
                $total += $lineTotal;
            }
        }

        return view('checkout.index', compact('items', 'total'));
    }
}

