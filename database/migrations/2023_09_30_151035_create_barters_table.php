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
        Schema::create('barters', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('postal_code');
            $table->string('city');
            $table->string('street_number');
            $table->string('street_name');
            $table->boolean('address_visible');
            $table->json('images');
            $table->string('title');
            $table->text('description');
            $table->timestamps();
            
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barters');
    }
};
