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
            $table->text('comment');
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
