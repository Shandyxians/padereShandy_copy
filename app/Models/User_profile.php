<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_profile extends Model
{
    use HasFactory;

    protected $table = "user_profile";
    protected $fillable = [
        "full_name",
        "contact_number",
        "email",
        "profile_image",
        "user_id"
      
   ];
}
