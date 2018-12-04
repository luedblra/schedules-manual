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
        $originBol      = false;
        $destinationBol = false;
        $carrierBol     = false;

        $origin        = Harbor::where('code',$origin)->orWhere('id',$origin)->first();
        $destination   = Harbor::where('code',$destination)->orWhere('id',$destination)->first();
        $carrier       = Carrier::where('name',$carrier)->orWhere('id',$carrier)->first();

        if(count($origin) == 1){
            $originBol  = true;
        }
        if(count($destination) == 1){
            $destinationBol = true;
        }
        if(count($carrier) == 1){
            $carrierBol = true;
        }

        if($originBol == true && $destinationBol == true && $carrierBol == true ){

            $schedules     = DB::select('call procedure_schedules_all('.$origin['id'].','.$destination['id'].','.$carrier['id'].')');
        } else {
            $schedules = [];
        }
        return response()->json($schedules);
    }

    public function ForCarrier($carrier){

        $carrier    = Carrier::where('name',$carrier)->orWhere('id',$carrier)->first();
        if(count($carrier) > 0){
            $schedules  = DB::select('call procedure_schedules('.$carrier["id"].')');
        } else {
            $schedules = [];
        }
        return response()->json($schedules);
    }
}
