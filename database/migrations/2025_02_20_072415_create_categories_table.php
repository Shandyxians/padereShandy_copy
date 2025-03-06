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
        Schema::create('categories', function (Blueprint $table) {
            $table->id("category_id");
            $table->string("category_name", 50);
        });
        DB::table('categories')->insert([
            [
                "category_name" => "Food Carts"
            ],
            [
                "category_name" => "Activity Booths"
            ],
            [
                "category_name" => "Other Supplies"
            ]
            ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
