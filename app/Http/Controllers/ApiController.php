<?php

namespace App\Http\Controllers;

use PrvHarbor;
use App\Harbor;
use App\Carrier;
use App\Schedule;
use App\RouteType;
use App\Credentialapi;
use GuzzleHttp\Client;
use App\FailedSchedule;
use App\AccountSchedule;
use App\Jobs\ChunkApiJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\ScheduleResource;

class ApiController extends Controller
{

    // Para imprimir El JSON - API
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

        return new ScheduleResource($schedules);

        //return response()->json($schedules);
    }

    public function ForCarrier($carrier){

        $carrier    = Carrier::where('name',$carrier)->orWhere('id',$carrier)->first();
        if(count($carrier) > 0){
            $schedules  = DB::select('call procedure_schedules('.$carrier["id"].')');
        } else {
            $schedules = [];
        }

        return new ScheduleResource($schedules);

        //return response()->json($schedules);
    }

    // Para Consumir la App Automatic

    public function testApi(){
        $destinationArr = PrvHarbor::get_harbor_api('San Antonio');
        dd($destinationArr);
    }

    public function ForceApiConsume(Request $request){
        ChunkApiJob::dispatch(1);
        ChunkApiJob::dispatch(2);
        $request->session()->flash('message.nivel', 'success');
        $request->session()->flash('message.icon', 'check');
        $request->session()->flash('message.title', 'Well done!');
        return redirect()->route('AcountS.index');
    }

    public function eventApi($id){
        ChunkApiJob::dispatch($id);
        return new ScheduleResource(['name' => 'EventApi', 'status' => 200]);
    }
}
