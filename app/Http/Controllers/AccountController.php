<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;


class AccountController extends Controller
{
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
    public function orders()
    {
        $orders = Auth::user()->orders()->latest()->get();
        return view('account.orders', compact('orders'));
    }

    public function showOrder(Order $order)
    {
        // Ensure the order belongs to the logged-in user
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        return view('account.order-show', compact('order'));
    }
}
