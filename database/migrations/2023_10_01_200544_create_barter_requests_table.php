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
        Schema::create('barter_requests', function (Blueprint $table) {
            $table->id();
            $table->text('message');
            $table->text('title');
            $table->decimal('price', 10, 2); // Add the "price" column with 10 total digits and 2 decimal places
            $table->string('image')->nullable();
            $table->unsignedBigInteger('barter_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
            $table->foreign('barter_id')->references('id')->on('barters');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barter_requests');
    }
};
