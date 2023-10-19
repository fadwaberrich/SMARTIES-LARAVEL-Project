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
        if (!Schema::hasTable('annonces')) {
        Schema::create('annonces', function (Blueprint $table) {
            // Your existing columns
            $table->id();
            $table->unsignedBigInteger('id_categorie');
            $table->unsignedBigInteger('id_user')->nullable();
            $table->string('titre');
            $table->text('description');
            $table->string('telephone');
            $table->string('photo');
            $table->string('echange');
            $table->unsignedBigInteger('product_id')->nullable(); // Foreign key to link with products table
            $table->foreign('product_id')->references('id')->on('products');
            // Other columns...
            $table->timestamps();
        });
    }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
