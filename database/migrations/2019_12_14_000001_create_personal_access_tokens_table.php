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
        // Personal access tokens table used by Laravel Sanctum or similar
        // packages to store long-lived API tokens tied to a model (e.g. User).
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            // Primary key
            $table->id();

            // Polymorphic relation (tokenable_type, tokenable_id) so tokens
            // can belong to different models (users, admins, etc.)
            $table->morphs('tokenable');

            // A human-readable name for the token (e.g., "deploy-key")
            $table->string('name');

            // The actual token value (hashed in many setups); unique to prevent
            // duplicates.
            $table->string('token', 64)->unique();

            // JSON/text list of abilities/permissions the token has; nullable
            // for full-access tokens.
            $table->text('abilities')->nullable();

            // When the token was last used (optional)
            $table->timestamp('last_used_at')->nullable();

            // Optional expiration timestamp
            $table->timestamp('expires_at')->nullable();

            // created_at and updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_access_tokens');
    }
};
