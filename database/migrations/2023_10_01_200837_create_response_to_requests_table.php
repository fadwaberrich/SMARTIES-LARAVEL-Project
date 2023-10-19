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
        Schema::create('response_to_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barter_request_id')->constrained('barter_requests')->onDelete('cascade');
            $table->text('message');
            $table->string('status'); // Add the 'status' column with a default value of 'pending'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('response_to_requests');
    }
};
