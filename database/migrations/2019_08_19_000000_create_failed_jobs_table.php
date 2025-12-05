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
        // Store failed queue jobs so they can be inspected, retried, or
        // logged. This table is used by Laravel's queue worker when a job
        // throws an exception and fails permanently.
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();

            // Unique identifier for the failed job
            $table->string('uuid')->unique();

            // Connection and queue names allow identifying where the job ran
            $table->text('connection');
            $table->text('queue');

            // Payload contains serialized job data (including class, data)
            $table->longText('payload');

            // Exception stack trace / message recorded for debugging
            $table->longText('exception');

            // Timestamp when the job failed
            $table->timestamp('failed_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('failed_jobs');
    }
};
