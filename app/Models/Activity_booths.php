<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity_booths extends Model
{
    use HasFactory;

    protected $table = "activity_booths";
    protected $fillable = [
        "name",
        "price_per_hour"
   ];
}
