<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
    $users = User::whereHas('roles', fn($q) => $q->where('name', 'customer'))->get();
    $products = Product::all();

    foreach (range(1, 10) as $i) {
        $user = $users->random();
        $order = Order::create([
            'user_id' => $user->id,
            'total' => 0,
            'status' => 'completed',
        ]);

        $items = $products->random(rand(1, 3));
        $total = 0;

        foreach ($items as $product) {
            $qty = rand(1, 5);
            $price = $product->price;
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => $qty,
                'price' => $price,
            ]);
            $total += $qty * $price;
        }

        $order->update(['total' => $total]);
        }
    }
}
