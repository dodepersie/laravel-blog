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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username', 255)->nullable(false)->unique('users.username_unique');
            $table->string('email', 255)->nullable(false)->unique('users.email_unique');
            $table->string('password');
            $table->string('description')->nullable();
            $table->string('avatar')->nullable();
            $table->enum('role', ['God', 'Admin', 'User'])->default('User');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
