<?php

namespace App\Http\Controllers;

use App\Harbor;
use App\Carrier;
use App\Schedule;
use App\RouteType;
use GuzzleHttp\Client;
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

        $client = new Client();
        $response = $client->request('GET', 'http://sautomatic/schedule/maersk');
        echo $response->getStatusCode(); # 200
        echo $response->getHeaderLine('content-type'); # 'application/json; charset=utf8'
        $dataGen = json_decode($response->getBody()->getContents(),true);
        $scheduleColle = collect([]);
        foreach($dataGen['data'] as $data){
            $originVal      = '';
            $destinyVal     = '';
            $etdVal         = '';
            $etaVal         = '';
            $vesselVal      = '';
            $vesselNameVal  = '';
            $carrierVal     = '';
            $transitimeVal  = '';
            $transferVal    = '';

            $originApi  = $data['OriginPortCode'];
            $destinyApi = $data['DestinationPortCode'];
            $port       = 'las palmas';

            $portExitBol    = false;
            $portMulExitBol = false;
            $portCollect    = collect([]);

            $port     = strtolower(trim($port));
            $portobj  = Harbor::where('varation','LIKE','%'.$port.'%')->with('country')->get();

            if(count($portobj) == 1){
                $portExitBol = true;
                foreach($portobj as $portuni){
                    $portVal = $portuni->id;
                }
            } else if(count($portobj) > 1){
                $portMulExitBol = true;
                $puertoArr = [];
                foreach($portobj as $portm){
                    array_push($puertoArr,['id' => $portm->id,'country' => $portm->country['name'],'name' => $portm->name]);
                }

                $portVal = json_encode($puertoArr,true);
            } else {
                $portVal = $port;
            }

            $prueba = [
                'puerto'    => $portVal,
                'unico'     => $portExitBol,
                'multiple'  => $portMulExitBol
            ];


            /*$scheduleArr =  [
                'origin'                => $originVal,
                'DestinationPortCode'   => 
                'Etd'                   => 
                'Eta'                   => 
                'Vessel'                => 
                'VesselName'            => 
                'Carrier'               => 
                'Transitime'            => 
                'Transfer'              => 
            ];
            "OriginPortCode" => "Valparaiso"
                "DestinationPortCode" => "N'Djamena"
                "Etd" => "2019-01-14"
                "Eta" => "2019-04-01"
                "Vessel" => "275"
                "VesselName" => "LICA MAERSK"
                "Carrier" => "Maersk"
                "Transitime" => 77
                "Transfer" => 4*/
            dd($prueba);
        }

    }
}
