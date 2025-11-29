<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    // Add product to cart
    public function add(Request $request, Product $product)
    {
        $quantity = max(1, (int) $request->input('quantity', 1));

        $cart = session()->get('cart', []);

        // Store as integers: product_id => quantity
        $cart[$product->id] = ($cart[$product->id] ?? 0) + $quantity;

        session()->put('cart', $cart);

        return redirect()->back()->with('success', "{$product->name} added to cart!");
    }
// Display checkout page with cart items
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

    // Handle order placement this method would be called on form submission from checkout page
    public function placeOrder(Request $request)
    {
        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('checkout')->with('error', 'Your cart is empty.');
        }

        DB::beginTransaction();

        try {
            $order = Order::create([
                'user_id' => auth()->id(),
                'name'    => $request->input('name'),
                'address' => $request->input('address'),
                'method'  => $request->input('payment_method'),
                'total'   => 0, // will update later
            ]);

            $total = 0;

            foreach ($cart as $id => $quantity) {
                $product = Product::find($id);
                if ($product) {
                    $lineTotal = $product->price * $quantity;
                    $total += $lineTotal;

                    OrderItem::create([
                        'order_id'   => $order->id,
                        'product_id' => $product->id,
                        'quantity'   => $quantity,
                        'price'      => $product->price,
                    ]);
                }
            }

            $order->update(['total' => $total]);

            DB::commit();

            session()->forget('cart');

        // Redirect to order history instead of checkout
        return redirect()->route('account.orders')->with('success', 'Order placed successfully!');
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->route('checkout')->with('error', 'Something went wrong. Please try again.');
            }
    }

}

