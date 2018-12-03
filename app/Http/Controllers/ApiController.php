<?php

namespace App\Http\Controllers;

use App\Harbor;
use App\Carrier;
use App\Schedule;
use App\RouteType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
   public function AllExpecifict($carrier,$origin,$destination){
      $origin        = Harbor::where('name',$origin)->orWhere('id',$origin)->first();
      $destination   = Harbor::where('name',$destination)->orWhere('id',$destination)->first();
      $carrier       = Carrier::where('name',$carrier)->orWhere('id',$carrier)->first();
      $schedules     = DB::select('call procedure_schedules_all('.$origin['id'].','.$destination['id'].','.$carrier['id'].')');
      dd($schedules);
      return response()->json($schedules);
   }

   public function ForCarrier($carrier){

      $carrier    = Carrier::where('name',$carrier)->orWhere('id',$carrier)->first();
      if(count($carrier) > 0){

         $schedules  = DB::select('call procedure_schedules('.$carrier["id"].')');
         return response()->json($schedules);
      } else {
         $schedules = [];
         return response()->json($schedules);
      }
   }
}
