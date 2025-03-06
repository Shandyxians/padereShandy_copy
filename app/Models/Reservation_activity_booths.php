<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation_activity_booths extends Model
{
    use HasFactory;

    protected $table = "reservation_activity_booths";
    protected $fillable = [
        "hours",
        "activity_booth_id",
        "reservation_id"
   ];
}
