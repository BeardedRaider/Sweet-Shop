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
        // Pivot table connecting users and roles (many-to-many relationship).
        // Each row assigns a role to a user. Using cascade deletes keeps
        // assignments clean when a user or role is removed.
        Schema::create('role_user', function (Blueprint $table) {
            $table->id();

            // Reference to the role
            $table->foreignId('role_id')->constrained()->onDelete('cascade');

            // Reference to the user
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_user');
    }
};
