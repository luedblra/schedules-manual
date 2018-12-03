<?php

namespace App\Http\Controllers;

use App\Harbor;
use App\Carrier;
use App\Schedule;
use App\RouteType;
use Illuminate\Http\Request;

class ApiController extends Controller
{
   public function AllExpecifict($carrier,$origin,$destination){
      dd('Todo');
   }

   public function ForCarrier($carrier){
      $carrier    = Carrier::where('name',$carrier)->orWhere('id',$carrier)->first();

      $schedules  = Schedule::where('carrier_id',$carrier['id'])->with('carrier')->get();
      return response()->json($schedules);
   }
}
