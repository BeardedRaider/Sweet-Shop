<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\Product;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Select users who have the 'customer' role
        $users = User::whereHas('roles', fn($q) => $q->where('name', 'customer'))->get();
        $products = Product::all();

        // If no customers OR no products exist, skip seeding orders
        if ($users->isEmpty() || $products->isEmpty()) {
            return;
        }

        // Create 10 sample completed orders
        foreach (range(1, 10) as $i) {
            $user = $users->random();

            // Create the order with a placeholder total (updated later)
            $order = Order::create([
                'user_id' => $user->id,
                'total' => 0,
                'status' => 'completed',
            ]);

            // Choose between 1 and 3 random products for this order
            $items = $products->random(rand(1, 3));
            $total = 0;

            foreach ($items as $product) {
                $qty = rand(1, 5);
                $price = $product->price;

                // Create an order item snapshot (price recorded at time of order)
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $qty,
                    'price' => $price,
                ]);

                // Accumulate order total
                $total += $qty * $price;
            }

            // Update the order with the computed total
            $order->update(['total' => $total]);
        }
    }
}
