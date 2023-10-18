<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->decimal('weight', 8, 2); // Assuming weight is a decimal field
            $table->string('category');
            $table->decimal('price', 10, 2); // Assuming price is a decimal field
            $table->string('units');
            $table->longText('description')->nullable();
            $table->string('address')->nullable();
            $table->string('image')->nullable();
            $table->enum('status', ['active', 'deactive']);
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
