<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservation_food_carts', function (Blueprint $table) {
            $table->id();
            $table->integer("quantity");
            $table->integer("hours");
            $table->unsignedBigInteger("food_cart_id");
            $table->unsignedBigInteger("reservation_id");
            $table->foreign("reservation_id")->references("id")->on("reservations")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("food_cart_id")->references("id")->on("food_carts")->onDelete("cascade")->onUpdate("cascade");
        });
        DB::table('reservation_food_carts')->insert([
            [
                "quantity" => 2,
                "hours" => 5,
                "food_cart_id" => 1,
                "reservation_id" => 1
            ]
            ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation_food_carts');
    }
};
