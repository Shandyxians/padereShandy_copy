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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string("title", 50);
            $table->text("message", 255);
            $table->enum("type", ["reservation_request", "reservation_accepted", "reservation_cancelled", "cancellation_requested", "other"]);
            $table->timestamp("created_at")->nullable();

            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("reservation_id");
            $table->foreign("reservation_id")->references("id")->on("reservations")->onDelete("cascade")->onUpdate("cascade");

            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade")->onUpdate("cascade");
        });
        DB::table('notifications')->insert([
            [
                "title" => "Reservation Request",
                "message" => "Reservation has been accepted",
                "type" => "reservation_request",
                "created_at" => now(),
                "user_id" => 1,
                "reservation_id" => 1
            ]
        ]);
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
