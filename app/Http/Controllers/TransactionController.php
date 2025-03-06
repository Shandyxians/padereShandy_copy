<?php

namespace App\Http\Controllers;

use App\Models\Reservations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{

    //Level 1

    public function getTransData(){

        $easy = DB::select('SELECT res.*, event_date, start_time, end_time, event_address, payments_status, payment_link,total_amount,admin_id,customer_id  FROM reservations AS res
            INNER JOIN admin AS a ON a.id = res.admin_id
            INNER JOIN user_profile AS up ON up.id = res.customer_id
            INNER JOIN payments AS pay ON pay.id = res.id

        ');

        return response()->json(['success' => true, 'Easy' => $easy ], 200);
    }

    //Level 2

    // public function getTransData(){

    //     $moderate = DB::table('reservations AS res')
    //        ->select('res.*', 'event_date', 'start_time', 'end_time', 'event_address', 'payments_status', 'payment_link','total_amount','admin_id','customer_id')
    //        ->join ('admin AS a' , 'a.id', 'res.admin_id')
    //        ->join ('user_profile AS up', 'up.id', 'res.customer_id')
    //        ->join ('payments AS pay', 'pay.id', 'res.id')
    //        ->get();


    //     return response()->json(['success' => true, 'Moderate' => $moderate ], 200);
    // }

    //Level 3

    // public function getTransData(){

    //     $challenging = Reservations::with('admin','user_profile','payments')->get();


    //     return response()->json(['success' => true, 'Challenging' => $challenging ], 200);
    // }

    //Level 4

    // public function getTransData(){

    //     $difficult = Reservations::with(['admin' => function($q){$q->select('*');
    //     }])->with(['user_profile' => function($q){
    //         $q->select('*');
    //     }])->with(['payments' => function($q){
    //         $q->select('*');
    //     }])->get();

    //     return response()->json(['success' => true, 'Difficult' => $difficult ], 200);
    // }


}
