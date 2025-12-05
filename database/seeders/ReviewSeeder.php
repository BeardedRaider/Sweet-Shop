<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        // Generate 20 random reviews using the Review factory.
        // Factories produce realistic dummy data for development/testing.
        Review::factory()->count(20)->create();
    }
}
