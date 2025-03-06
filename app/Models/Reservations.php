<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    use HasFactory;

    protected $table = "reservations";
    protected $fillable = [
        "event_date",
        "start_time",
        "end_time",
        "event_address",
        "contact_number",
        "status",
        "payment_status",
        "payment_link",
        "total_amount",
        "admin_id",
        "customer_id"
   ];

   public function admin()
   {
       return $this->belongsTo(Admin::class, 'admin_id', 'id');
   }

  
   public function user_profile()
   {
       return $this->belongsTo(User_profile::class, 'customer_id', 'id');
   }

  
   public function payments()
   {
       return $this->hasOne(Payments::class, 'id', 'id');
   }
}
