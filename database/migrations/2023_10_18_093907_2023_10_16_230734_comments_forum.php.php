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
        Schema::create('comment_forums', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD:database/migrations/2023_10_01_200837_create_response_to_requests_table.php
            $table->foreignId('barter_request_id')->constrained('barter_requests')->onDelete('cascade');
            $table->text('message');
            $table->string('status'); // Add the 'status' column with a default value of 'pending'
=======
            $table->text('comment');
>>>>>>> 2f9d177a6340e7e9be7f8bf42109ac47e668e7ed:database/migrations/2023_10_18_093907_2023_10_16_230734_comments_forum.php.php
            $table->timestamps();
            $table->foreignId('forum_id')->constrained('forums');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commentforums');
    }
};
