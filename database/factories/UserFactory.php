<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 *
 * Factory for the User model. Use this in tests and seeders to create
 * realistic user records quickly. Example:
 *     User::factory()->count(5)->create();
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Full name
            'name' => fake()->name(),

            // Unique and safe email for testing
            'email' => fake()->unique()->safeEmail(),

            // By default the factory marks emails as verified; call ->unverified()
            // to explicitly create unverified users in tests.
            'email_verified_at' => now(),

            // Default password for generated users. The static property ensures
            // the password hashing work is done only once across factory calls.
            'password' => static::$password ??= Hash::make('password'),

            // Random token used by the remember me functionality
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
