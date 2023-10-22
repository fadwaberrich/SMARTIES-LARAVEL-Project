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
<<<<<<< Updated upstream
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
=======
<<<<<<<< Updated upstream:database/migrations/2023_09_30_152126_create_comments_table.php
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('barter_id')->constrained();
            $table->text('content');
========
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('role')->default('user');
>>>>>>> Stashed changes
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
<<<<<<< Updated upstream
=======
>>>>>>>> Stashed changes:database/migrations/2014_10_12_000000_create_users_table.php
>>>>>>> Stashed changes
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
<<<<<<< Updated upstream
        Schema::dropIfExists('users');
=======
<<<<<<<< Updated upstream:database/migrations/2023_09_30_152126_create_comments_table.php
        Schema::dropIfExists('comments');
========
        Schema::dropIfExists('users');
>>>>>>>> Stashed changes:database/migrations/2014_10_12_000000_create_users_table.php
>>>>>>> Stashed changes
    }
};
