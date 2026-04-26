<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// This migration creates the `users` table which stores basic
// authentication and profile information for application users.
return new class extends Migration
{
    /**
     * Run the migrations.
     * This method is executed when running `php artisan migrate`.
     * It defines the schema for the `users` table using the
     * schema builder provided by Laravel.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            // Primary key (auto-incrementing unsigned bigint)
            $table->id();
            
            // User's display name
            $table->string('name');

            // Email is unique so two users cannot share the same address
            $table->string('email')->unique();

            // Timestamp when the user's email was verified; nullable
            // because verification may not have happened yet
            $table->timestamp('email_verified_at')->nullable();
            // Hashed password for authentication
            $table->string('password');

            // Remember token used by Laravel to implement "remember me" sessions
            $table->rememberToken();

            // Laravel's created_at and updated_at timestamp columns
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * This method is executed when running `php artisan migrate:rollback`
     * or `php artisan migrate:reset`. It drops the `users` table.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
