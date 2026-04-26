<?php

namespace Database\Factories;

use App\Models\Review;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    protected $model = Review::class;

    public function definition(): array
    {
        // Ensure at least one user exists
        $user = User::inRandomOrder()->first() ?? User::factory()->create();

        // Ensure at least one product exists
        $product = Product::inRandomOrder()->first() ?? Product::factory()->create();

        return [
            'user_id' => $user->id,
            'product_id' => $product->id,
            'body' => $this->faker->sentence(12),
            'rating' => $this->faker->numberBetween(1, 5),
        ];
    }
}
