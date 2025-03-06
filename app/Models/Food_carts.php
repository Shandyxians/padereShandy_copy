<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food_carts extends Model
{
    use HasFactory;

    protected $table = "food_carts";
    protected $fillable = [
        "name",
        "price_per_hour"
   ];
}
