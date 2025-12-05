<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Create the `orders` table. This table records one order per row
        // and links to the `users` table via a foreign key.
        Schema::create('orders', function (Blueprint $table) {
            // Primary key - auto-incrementing unsigned bigint
            $table->id();

            // Foreign key to the users table. Using `constrained()` assumes
            // the referenced table is `users` and the referenced column is `id`.
            // `onDelete('cascade')` ensures orders are removed when a user is deleted.
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Total cost of the order. Precision 8, scale 2 (e.g., 123456.78)
            $table->decimal('total', 8, 2);

            // Order status with a sensible default. Example values: 'pending',
            // 'processing', 'completed', 'cancelled'. Using a string provides
            // flexibility; consider converting to an enum in the future.
            $table->string('status')->default('pending'); // e.g., pending, completed

            // Timestamps: `created_at` and `updated_at` managed by Eloquent
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
