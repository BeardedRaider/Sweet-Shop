<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Central seeder that runs other seeders in the desired order.
        // Add additional seeders to the array as needed. Keeping order
        // explicit helps satisfy foreign key constraints during seeding.
        $this->call([
            ReviewSeeder::class,
        ]);
    }

}
