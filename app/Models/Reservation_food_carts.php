<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation_food_carts extends Model
{
    use HasFactory;

    protected $table = "reservation_food_carts";
    protected $fillable = [
        "quantity",
        "hours",
        "food_cart_id",
        "reservation_id"
   ];
}
