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
        // Reviews left by users for products. Each review belongs to both a
        // user and a product. Ratings are stored as an unsigned tiny integer
        // (suitable for 1–5 star systems).
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();

            // Author of the review
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Product being reviewed
            $table->foreignId('product_id')->constrained()->onDelete('cascade');

            // The review content
            $table->text('body');

            // Star rating (1–5). Use unsignedTinyInteger to save space.
            $table->unsignedTinyInteger('rating'); // 1–5 stars

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
