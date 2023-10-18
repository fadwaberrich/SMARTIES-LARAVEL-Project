<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('products')) {
            Schema::create('products', function (Blueprint $table) {
                // Your existing columns for the products table
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

                // Other columns...
            });
        }

        if (!Schema::hasTable('annonces')) {
            Schema::create('annonces', function (Blueprint $table) {
                // Your existing columns for the annonces table
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
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop tables in reverse order
        Schema::dropIfExists('annonces');
        Schema::dropIfExists('products');
    }
};
