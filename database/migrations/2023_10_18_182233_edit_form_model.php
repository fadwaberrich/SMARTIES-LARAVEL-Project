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
        Schema::table('forms', function (Blueprint $table) {
            // Add 'title' and 'description' columns
            $table->string('title');
            
            // Remove 'senderName' and 'receiverName' columns
            $table->dropColumn('senderName');
            $table->dropColumn('receiverName');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('forms', function (Blueprint $table) {
            // Reverse the changes, add back 'senderName' and 'receiverName'
            $table->string('senderName');
            $table->string('receiverName');
            
            // Remove 'title' and 'description' columns
            $table->dropColumn('title');
            $table->dropColumn('description');
        });
    }
};
