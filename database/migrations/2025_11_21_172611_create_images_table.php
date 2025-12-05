<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Create `images` table to store file references for product images.
        // Images are associated with a product and store the filesystem path
        // and optional alt text for accessibility.
        Schema::create('images', function (Blueprint $table) {
            $table->id();

            // Link back to the product; cascade remove when product deleted
            $table->foreignId('product_id')->constrained()->onDelete('cascade');

            // Path to the stored image (relative to storage or public folder)
            $table->string('path'); // e.g. 'images/products/chocolate-fudge.jpg'

            // Optional alt text used in <img alt="..."> for accessibility
            $table->string('alt_text')->nullable(); // optional for accessibility

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
