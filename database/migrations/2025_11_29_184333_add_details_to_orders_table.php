<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Add customer details and payment/delivery method fields to orders.
        // These fields are added after an existing column for clarity, but the
        // order of columns does not affect application logic.
        Schema::table('orders', function (Blueprint $table) {
            // Customer name for the order (e.g., billing name)
            $table->string('name')->after('user_id');

            // Address for delivery or billing
            $table->string('address')->after('name');

            // Payment/delivery method used for the order
            $table->string('method')->after('address');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['name', 'address', 'method']);
        });
    }
};

