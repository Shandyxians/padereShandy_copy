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
        Schema::create('reservation_activity_booths', function (Blueprint $table) {
            $table->id();
            $table->integer("hours");
            $table->unsignedBigInteger("activity_booth_id");
            $table->unsignedBigInteger("reservation_id");
            $table->foreign("reservation_id")->references("id")->on("reservations")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("activity_booth_id")->references("id")->on("activity_booths")->onDelete("cascade")->onUpdate("cascade");
 
        });
        DB::table('reservation_activity_booths')->insert([
            [
                "hours" => 3,
                "activity_booth_id" => 1,
                "reservation_id" => 1
            ]
            ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation_booths');
    }
};
