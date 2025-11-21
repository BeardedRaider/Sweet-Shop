<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        // Generate 20 random reviews
        Review::factory()->count(20)->create();
    }
}
