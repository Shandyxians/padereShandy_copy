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
        Schema::create('products', function (Blueprint $table) {
            $table->id("product_id");
            $table->string("product_name", 50);
            $table->text("description");
            $table->string("product_image", 100);
            $table->decimal("price_per_hour");
            $table->unsignedBigInteger("category_id");
            $table->foreign("category_id")->references("category_id")->on("categories")->onDelete("cascade")->onUpdate("cascade");
        });
        DB::table('products')->insert([
            [
                "product_name" => "Tasty Cart",
                "description" => "A food carts offering a variety of snacks and drinks",
                "product_image" => "food_cart.jpg",
                "price_per_hour" => 50.00,
                "category_id" => 1
            ],
            [
                "product_name" => "Photo Booth",
                "description" => "A Booth offering a photo snap",
                "product_image" => "photo_booth.jpg",
                "price_per_hour" => 100.00,
                "category_id" => 2
            ],
            [
                "product_name" => "Back Drop",
                "description" => "A background design for the event",
                "product_image" => "backdrop.jpg",
                "price_per_hour" => 200.00,
                "category_id" => 3
            ]
            ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
