<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_profile', function (Blueprint $table) {
            $table->id();
            $table->string("full_name", 50);
            $table->string("contact_number", 11);
            $table->string("email", 50);
            $table->string("profile_image", 100);

            $table->unsignedBigInteger("user_id");

            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade")->onUpdate("cascade");
           
        });
        $userId = DB::table('users')->insert([
            [
                "userName" => "abrea",
                "email" => "occ.abrea@gmail.com",
                "password" => Hash::make("imba"),
                "role" => "admin",
                "reset_token" => '',
                "token_expiry" => now(),
                "reset_token_hash" => '',
                "reset_token_expires_at" => now()
            ],
            [
                "userName" => "padere",
                "email" => "occ.padere@gmail.com",
                "password" => Hash::make("imba1"),
                "role" => "admin",
                "reset_token" => '',
                "token_expiry" => now(),
                "reset_token_hash" => '',
                "reset_token_expires_at" => now()
            ],
            [
                "userName" => "antiquina",
                "email" => "occ.antiquina@gmail.com",
                "password" => Hash::make("imba2"),
                "role" => "admin",
                "reset_token" => '',
                "token_expiry" => now(),
                "reset_token_hash" => '',
                "reset_token_expires_at" => now()
            ]
            ]);

        DB::table('user_profile')->insert([
            [
                "full_name" => "JB Abrea",
               "contact_number" => "09020105033",
                "email" => "occ.abrea@gmail.com",
                "profile_image" => "default_profile_image.jpg",
                "user_id" => $userId
            ],
            [
                "full_name" => "Shandy Padere",
                "contact_number" => "09432453463",
                "email" => "occ.padere@gmail.com",
                "profile_image" => "default_profile_image.jpg",
                "user_id" => $userId
            ],
            [
                "full_name" => "Jonne Antiquina",
                "contact_number" => "09756732525",
                "email" => "occ.antiquina@gmail.com",
                "profile_image" => "default_profile_image.jpg",
                "user_id" => $userId
            ]
            ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profile');
    }
};
