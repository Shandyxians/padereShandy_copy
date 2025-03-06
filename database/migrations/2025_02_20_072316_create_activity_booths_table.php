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
        Schema::create('activity_booths', function (Blueprint $table) {
            $table->id();
            $table->string("name", 50);
            $table->decimal("price_per_hour");
        });
        DB::table('activity_booths')->insert([
            [
                "name" => "Photo Booth",
                "price_per_hour" => 100.00
            ]
            ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_booths');
    }
};

