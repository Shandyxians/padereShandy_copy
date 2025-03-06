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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->date("event_date");
            $table->time("start_time");
            $table->time("end_time");
            $table->text("event_address");
            $table->string("contact_number", 11);
            $table->enum("status", ["pending", "confrimed", "cancelled"]);
            $table->enum("payments_status", ["unpaid", "paid"]);
            $table->string("payment_link", 255);
            $table->decimal("total_amount");
            $table->unsignedBigInteger("admin_id");
            $table->unsignedBigInteger("customer_id");
            $table->foreign("admin_id")->references("id")->on("admin")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("customer_id")->references("id")->on("user_profile")->onDelete("cascade")->onUpdate("cascade");
        });
        DB::table('reservations')->insert([
            [
                "event_date" => "2025-03-15",
                "start_time" => "06:00:00",
                "end_time" => "07:00:00",
                "event_address" => "Patag",
                "contact_number" => "09020105033",
                "status" => "pending",
                "payments_status" => "unpaid",
                "payment_link" => "gcash.com",
                "total_amount" => 400.00,
                "admin_id" => 1,
                "customer_id" => 1
            ],
            [
                "event_date" => "2025-04-15",
                "start_time" => "07:00:00",
                "end_time" => "08:00:00",
                "event_address" => "Iponan",
                "contact_number" => "09432453463",
                "status" => "pending",
                "payments_status" => "paid",
                "payment_link" => "BPI.com",
                "total_amount" => 500.00,
                "admin_id" => 2,
                "customer_id" => 2
            ],
            [
                "event_date" => "2025-05-15",
                "start_time" => "10:00:00",
                "end_time" => "12:00:00",
                "event_address" => "Manukan",
                "contact_number" => "09756732525",
                "status" => "pending",
                "payments_status" => "unpaid",
                "payment_link" => "Paypal.com",
                "total_amount" => 600.00,
                "admin_id" => 3,
                "customer_id" => 3
            ]
            ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
