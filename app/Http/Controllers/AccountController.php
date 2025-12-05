<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;


class AccountController extends Controller
{
    /**
     * User account controller.
     *
     * Displays account pages, handles profile updates and shows order
     * history/details for the authenticated user.
     */
    // Show the account page
    public function index()
    {
        return view('account.index');
    }

    // Handle profile update
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name'           => 'required|string|max:255',
            'email'          => 'required|email|unique:users,email,' . Auth::id(),
            'address_line1'  => 'nullable|string|max:255',
            'address_line2'  => 'nullable|string|max:255',
            'city'           => 'nullable|string|max:255',
            'postcode'       => 'nullable|string|max:255',
            'country'        => 'nullable|string|max:255',
        ]);

        $user = Auth::user();
        $user->update($validated);

        return redirect()->route('account')->with('success', 'Profile updated successfully!');
    }

    // Optional: show order history
    public function orders(Request $request)
    {
        $query = Auth::user()->orders()->latest();

        // Optional filtering by status
        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        // Paginate results (10 per page)
        $orders = $query->paginate(10);

        return view('account.orders', compact('orders'));
    }

    public function showOrder(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

    // Load products and their reviews by this user
        $order->load(['items.product.reviews' => function ($query) {
            $query->where('user_id', Auth::id());
        }]);

        return view('account.order-show', compact('order'));
    }
}
