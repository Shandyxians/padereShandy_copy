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
            $table->string("userName", 50);
            $table->string("email", 50);
            $table->string("password", 50);
            $table->enum("role",["admin", "customer"]);
            $table->string("reset_token", 64);
            $table->datetime("token_expiry");
            $table->string("reset_token_hash", 64);
            $table->datetime("reset_token_expires_at");

            
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
