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
        // Create the `products` table which stores catalog items available
        // for purchase in the shop. Each product has a name, optional
        // description, price and a stock level.
        Schema::create('products', function (Blueprint $table) {
            // Primary key
            $table->id();

            // Product title
            $table->string('name');

            // Longer description of the product; nullable if not provided
            $table->text('description')->nullable();

            // Product price (precision 8, scale 2) e.g., 999999.99 max
            $table->decimal('price', 8, 2);

            // Number of items in stock. Default to zero to avoid nulls.
            $table->integer('stock')->default(0);

            // created_at and updated_at timestamps
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
