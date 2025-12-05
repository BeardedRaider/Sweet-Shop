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
        // Roles table stores named roles that can be attached to users
        // (e.g. 'admin', 'customer'). A many-to-many pivot table links
        // users to roles, allowing users to have multiple roles.
        Schema::create('roles', function (Blueprint $table) {
            $table->id();

            // Role name identifier
            $table->string('name'); // 'admin', 'customer'

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
