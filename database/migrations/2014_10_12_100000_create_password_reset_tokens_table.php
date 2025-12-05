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
        // Password reset tokens table used to store the token issued when a
        // user requests a password reset. The token is typically emailed to
        // the user and used to verify the reset request.
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            // Using email as the primary key keeps the table small and makes
            // lookups by email efficient. Note: this differs from Laravel's
            // default `password_resets` naming in some apps.
            $table->string('email')->primary();

            // Token used to verify the reset request
            $table->string('token');

            // When the token was created; used to expire tokens after a period
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('password_reset_tokens');
    }
};
