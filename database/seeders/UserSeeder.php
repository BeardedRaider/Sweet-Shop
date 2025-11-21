<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
    $admin = User::firstOrCreate(
        ['email' => 'admin@sweetshop.com'],
        [
            'name' => 'Admin User',
            'password' => bcrypt('password'),
        ]
    );

    $admin->roles()->attach(Role::where('name', 'admin')->first());

    foreach (['Alice', 'Bob', 'Charlie'] as $name) {
        $user = User::firstOrCreate(
            ['email' => strtolower($name).'@sweetshop.com'],
            [
                'name' => $name,
                'password' => bcrypt('password'),
            ]
        );

        $user->roles()->attach(Role::where('name', 'customer')->first());
    }
}}