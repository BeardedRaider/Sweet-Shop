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
        // Create the `order_items` table which represents the many items
        // belonging to a single order. Each row is a snapshot of the product
        // purchased (including price at the time of purchase) and quantity.
        Schema::create('order_items', function (Blueprint $table) {
            // Primary key
            $table->id();

            // Foreign key to the orders table; cascade so items are removed
            // when the parent order is deleted.
            $table->foreignId('order_id')->constrained()->onDelete('cascade');

            // Foreign key to the products table; cascade if product removed.
            // In some systems you might keep product data denormalized here
            // (e.g., product name) but price is captured below.
            $table->foreignId('product_id')->constrained()->onDelete('cascade');

            // Quantity of this product in the order
            $table->integer('quantity');

            // Price charged for a single unit at time of ordering
            $table->decimal('price', 8, 2); // price at time of order

            // created_at and updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
