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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string("payment_methods", 100);
            $table->enum("status", ["success", "failed", "expired"]);
            $table->text("description");
            $table->decimal("price_per_hour");
            $table->unsignedBigInteger("reservation_id");
            $table->foreign("reservation_id")->references("id")->on("reservations")->onDelete("cascade")->onUpdate("cascade");

        });
        DB::table('payments')->insert([
            [
                "payment_methods" => "G-Cash",
                "status" => "failed",
                "description" => "Payment for reservation ID 1",
                "price_per_hour" => 400.00,
                "reservation_id" => 1
            ],
            [
                "payment_methods" => "BPI",
                "status" => "success",
                "description" => "Payment for reservation ID 1",
                "price_per_hour" => 500.00,
                "reservation_id" => 2
            ],
            [
                "payment_methods" => "Paypal",
                "status" => "success",
                "description" => "Payment for reservation ID 1",
                "price_per_hour" => 600.00,
                "reservation_id" => 3
            ]
            ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
