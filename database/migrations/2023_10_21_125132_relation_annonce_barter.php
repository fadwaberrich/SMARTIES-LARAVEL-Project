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
        Schema::table('barter_requests', function (Blueprint $table) {
            $table->unsignedBigInteger('annonce_id')->nullable();
            $table->foreign('annonce_id')->references('id')->on('annonces');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
