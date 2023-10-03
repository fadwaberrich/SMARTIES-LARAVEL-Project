<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProductsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('product', function (Blueprint $table) {
            // Add or update columns as needed
            $table->decimal('weight', 10, 2)->nullable()->change(); // Modify the 'weight' column
            $table->string('description')->nullable()->change(); // Modify the 'description' column
            $table->string('address')->nullable()->change(); // Modify the 'address' column
            $table->string('image')->nullable()->change(); // Modify the 'image' column
            $table->enum('status', ['active', 'deactive'])->default('deactive')->change(); // Modify the 'status' column

            // Add 'created_at' and 'updated_at' columns (if they don't already exist)
            if (!Schema::hasColumn('product', 'created_at')) {
                $table->timestamps();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('product', function (Blueprint $table) {
         
        });
    }
}
