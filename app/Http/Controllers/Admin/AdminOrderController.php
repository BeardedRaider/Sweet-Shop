<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    /**
     * Admin order management controller.
     *
     * Provides listing and detail views for all orders and allows admins
     * to update order status. Methods assume admin-level authorization
     * is enforced via middleware or gate checks elsewhere.
     */
    /**
     * Display a listing of all orders.
     * Admins can see every order, regardless of user.
     */
    public function index()
    {
        // Fetch latest orders with pagination
        $orders = Order::latest()->paginate(15);

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Display a single order with its details.
     */
    public function show(Order $order)
    {
        // Eager load order items for display
        $order->load('items.product');

        return view('admin.orders.show', compact('order'));
    }

    /**
     * Update the status of an order (pending → completed/cancelled).
     */
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,completed,cancelled',
        ]);

        $order->update(['status' => $request->status]);

        return redirect()
            ->route('admin.orders.index')
            ->with('success', "Order #{$order->id} status updated to {$order->status}.");
    }
}
