<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            RoleSeeder::class,
            ProductSeeder::class,
            ProductImageSeeder::class,
            ReviewSeeder::class,
            OrderSeeder::class,
        ]);
    }
}
