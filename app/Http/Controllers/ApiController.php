<?php

namespace App\Http\Controllers;

use PrvHarbor;
use App\Harbor;
use App\Carrier;
use App\Schedule;
use App\RouteType;
use GuzzleHttp\Client;
use App\FailedSchedule;
use App\AccountSchedule;
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

      $now = new \DateTime();
      $date = $now->format('Y-m-d');
      $hour = $now->format('H:m:s');

      $client = new Client();
      $response = $client->post('http://sautomatic/oauth/token', [
         'form_params' => [
            'client_id' => 2,
            // The secret generated when you ran: php artisan passport:install
            'client_secret' => '4A8kVmi5V8U9wawEHTcrF4AWMf7sRxpUFVvkWrPE',
            'grant_type' => 'password',
            'username' => 'user@example.com',
            'password' => 'secret',
            'scope' => '*',
         ]
      ]);
      $auth = json_decode((string)$response->getBody());
      $response = $client->get('http://sautomatic/schedule/maersk', [
         'headers' => [
            'Authorization' => 'Bearer '.$auth->access_token,
         ]
      ]);
      $dataGen = json_decode($response->getBody()->getContents(),true);

      $account = AccountSchedule::create([
         'name'      => 'Data API Automatic '.$hour,
         'date'      => $date,
         'user_id'   => 2
      ]);


      $scheduleColle = collect([]);
      foreach($dataGen['data'] as $data){

         $originVal      = '';
         $destinyVal     = '';
         $etdVal         = '';
         $etaVal         = '';
         $voyageVal      = '';
         $vesselNameVal  = '';
         $carrierVal     = '';
         $transitimeVal  = '';
         $transferVal    = '';
         $originApi      = '';
         $destinyApi     = '';
         $routetypeVal   = '';

         $originExitBol  = false;
         $destinyExitBol = false;
         $carrierExitBol = false;

         //---------- DECLARACIONES ----------------------------------

         $originApi      = $data['OriginPortCode'];
         $destinyApi     = $data['DestinationPortCode'];
         $etdApi         = $data['Etd'];
         $etaApi         = $data['Eta'];
         $voyageApi      = $data['Vessel'];
         $vesselApi      = $data['VesselName'];
         $carrierApi     = $data['Carrier'];
         $transitimeApi  = $data['Transitime'];
         $transferApi    = $data['Transfer'];

         // --------- ORIGIN -----------------------------------------            
         $originApiArr   = PrvHarbor::get_harbor_api($originApi);
         $originExitBol  = $originApiArr['boolean'];
         $originVal      = $originApiArr['puerto'];

         // --------- DESTINATION ------------------------------------            
         $destinyArr = PrvHarbor::get_harbor_api($destinyApi);
         $destinyExitBol  = $destinyArr['boolean'];
         $destinyVal      = $destinyArr['puerto'];

         // --------- ETD --------------------------------------------
         if(empty($etdApi) != true){
            $etdVal = $etdApi;
         } else {
            $etdVal = $etdApi.'_E_E';
         }

         // --------- ETA --------------------------------------------
         if(empty($etaApi) != true){
            $etaVal = $etaApi;
         } else {
            $etaVal = $etaApi.'_E_E';
         }  

         // --------- VOYAGE -----------------------------------------
         if(empty($voyageApi) != true){
            $voyageVal = $voyageApi;
         } else {
            $voyageVal = $voyageApi.'_E_E';
         }   

         // --------- VESSEL NAME ------------------------------------
         if(empty($vesselApi) != true){
            $vesselVal = $vesselApi;
         } else {
            $vesselVal = $vesselApi.'_E_E';
         } 

         // --------- CARRIER ----------------------------------------
         $carrierobj = Carrier::where('name',$carrierApi)->first();
         if(empty($carrierobj) != true){
            $carrierExitBol = true;
            $carrierVal = $carrierobj->id;
         } else {
            $carrierVal = $carrierApi.'_E_E';
         }  

         // --------- TRANSI TIME ------------------------------------
         if(empty($transitimeApi) != true){
            $transitimeVal = $transitimeApi;
         } else {
            $transitimeVal = $transitimeApi.'_E_E';
         }         
         // --------- TRASNFER ---------------------------------------
         if(count($transferApi) == 1 || count($transferApi) == 0){
            $routetypeVal = 1;
         } else if(count($transferApi) > 1){
            $routetypeVal = 2;
         } 


         /*            $scheduleArr =  [
                'originBol'     => $originExitBol,
                'origin'        => $originVal,
                'destinyBol'    => $destinyExitBol,
                'destiny'       => $destinyVal,
                'etd'           => $etdVal,
                'eta'           => $etaVal,
                'voyage'        => $voyageVal,
                'vessel'        => $vesselVal,
                'carrierBol'    => $carrierExitBol,
                'carrier'       => $carrierVal,
                'transitimeVal' => $transitimeVal,
                'route_type'    => $routetypeVal,
                'account_id'    => $account->id
            ];            
*/


         if($originExitBol == true && $destinyExitBol == true && $carrierExitBol == true){

            $countexitSched   = Schedule::where('origin',$originVal)
               ->where('destination',$destinyVal)
               ->where('carrier_id',$carrierVal)
               ->where('vessel',$vesselVal)
               ->where('voyage',$voyageVal)
               ->where('route_type',$routetypeVal)
               //->where('via',$viaVal)
               ->where('etd',$etdVal)
               ->where('eta',$etaVal)
               ->where('transit_time',$transitimeVal)
               ->get();

            if(count($countexitSched) == 0){
               Schedule::create([
                  'origin'                => $originVal,
                  'destination'           => $destinyVal,
                  'carrier_id'            => $carrierVal,
                  'vessel'                => $vesselVal,
                  'voyage'                => $voyageVal,
                  'route_type'            => $routetypeVal,
                  'via'                   => 'N/A',
                  'etd'                   => $etdVal,
                  'eta'                   => $etaVal,
                  'transit_time'          => $transitimeVal,
                  'account_schedules_id'  => $account->id
               ]);
            }
         } else {
            //Fallidos

            // --------- ORIGIN ---------------------------------------------------------
            if($originExitBol == true){
               $originVal = Harbor::find($originVal);
               $originVal = $originVal->name;
            }

            // --------- DESTINATION ----------------------------------------------------
            if($destinyExitBol == true){
               $destinyVal = Harbor::find($destinyVal);
               $destinyVal = $destinyVal->name;
            }

            // --------- CARRIER --------------------------------------------------------
            if($carrierExitBol == true){
               $carrierVal = Carrier::find($carrierVal);
               $carrierVal = $carrierVal->name;
            }
            // --------- ROUTE TYPE -----------------------------------------------------

            $routetypeVal = RouteType::find($routetypeVal);
            $routetypeVal = $routetypeVal->name;                
            /*
                $scheduleFailArr =  [
                    'originBol'     => $originExitBol,
                    'origin'        => $originVal,
                    'destinyBol'    => $destinyExitBol,
                    'destiny'       => $destinyVal,
                    'etd'           => $etdVal,
                    'eta'           => $etaVal,
                    'voyage'        => $voyageVal,
                    'vessel'        => $vesselVal,
                    'carrierBol'    => $carrierExitBol,
                    'carrier'       => $carrierVal,
                    'transitimeVal' => $transitimeVal,
                    'route_type'    => $routetypeVal,
                    'account_id'    => $account->id
                ];   */


            FailedSchedule::create([
               'origin'                => $originVal,
               'destination'           => $destinyVal,
               'carrier'               => $carrierVal,
               'vessel'                => $vesselVal,
               'voyage'                => $voyageVal,
               'route_type'            => $routetypeVal,
               'via'                   => 'N/A',
               'etd'                   => $etdVal,
               'eta'                   => $etaVal,
               'transit_time'          => $transitimeVal,
               'account_schedules_id'  => $account->id
            ]);

            //dd($scheduleFailArr);
         }


      }
      $countSchedules      = Schedule::where('account_schedules_id',$account->id)->get();
      $countSchedulesfail  = FailedSchedule::where('account_schedules_id',$account->id)->get();

      $countSchedules      = count($countSchedules);
      $countSchedulesfail  = count($countSchedulesfail);

      $accountcount =  AccountSchedule::find($account->id);
      $accountcount->countschedule       = $countSchedules;
      $accountcount->countfailedschedule = $countSchedulesfail;
      $accountcount->update();
      //dd('listo');
       return new ScheduleResource(['1']);

   }
   
   public function eventApi(){

      $now = new \DateTime();
      $date = $now->format('Y-m-d');
      $hour = $now->format('H:m:s');

      $client = new Client();
      $response = $client->post('http://sautomatic/oauth/token', [
         'form_params' => [
            'client_id' => 2,
            // The secret generated when you ran: php artisan passport:install
            'client_secret' => '4A8kVmi5V8U9wawEHTcrF4AWMf7sRxpUFVvkWrPE',
            'grant_type' => 'password',
            'username' => 'user@example.com',
            'password' => 'secret',
            'scope' => '*',
         ]
      ]);
      $auth = json_decode((string)$response->getBody());
      $response = $client->get('http://sautomatic/schedule/maersk', [
         'headers' => [
            'Authorization' => 'Bearer '.$auth->access_token,
         ]
      ]);
      $dataGen = json_decode($response->getBody()->getContents(),true);

      $account = AccountSchedule::create([
         'name'      => 'Data API Automatic '.$hour,
         'date'      => $date,
         'user_id'   => 2
      ]);


      $scheduleColle = collect([]);
      foreach($dataGen['data'] as $data){

         $originVal      = '';
         $destinyVal     = '';
         $etdVal         = '';
         $etaVal         = '';
         $voyageVal      = '';
         $vesselNameVal  = '';
         $carrierVal     = '';
         $transitimeVal  = '';
         $transferVal    = '';
         $originApi      = '';
         $destinyApi     = '';
         $routetypeVal   = '';

         $originExitBol  = false;
         $destinyExitBol = false;
         $carrierExitBol = false;

         //---------- DECLARACIONES ----------------------------------

         $originApi      = $data['OriginPortCode'];
         $destinyApi     = $data['DestinationPortCode'];
         $etdApi         = $data['Etd'];
         $etaApi         = $data['Eta'];
         $voyageApi      = $data['Vessel'];
         $vesselApi      = $data['VesselName'];
         $carrierApi     = $data['Carrier'];
         $transitimeApi  = $data['Transitime'];
         $transferApi    = $data['Transfer'];

         // --------- ORIGIN -----------------------------------------            
         $originApiArr   = PrvHarbor::get_harbor_api($originApi);
         $originExitBol  = $originApiArr['boolean'];
         $originVal      = $originApiArr['puerto'];

         // --------- DESTINATION ------------------------------------            
         $destinyArr = PrvHarbor::get_harbor_api($destinyApi);
         $destinyExitBol  = $destinyArr['boolean'];
         $destinyVal      = $destinyArr['puerto'];

         // --------- ETD --------------------------------------------
         if(empty($etdApi) != true){
            $etdVal = $etdApi;
         } else {
            $etdVal = $etdApi.'_E_E';
         }

         // --------- ETA --------------------------------------------
         if(empty($etaApi) != true){
            $etaVal = $etaApi;
         } else {
            $etaVal = $etaApi.'_E_E';
         }  

         // --------- VOYAGE -----------------------------------------
         if(empty($voyageApi) != true){
            $voyageVal = $voyageApi;
         } else {
            $voyageVal = $voyageApi.'_E_E';
         }   

         // --------- VESSEL NAME ------------------------------------
         if(empty($vesselApi) != true){
            $vesselVal = $vesselApi;
         } else {
            $vesselVal = $vesselApi.'_E_E';
         } 

         // --------- CARRIER ----------------------------------------
         $carrierobj = Carrier::where('name',$carrierApi)->first();
         if(empty($carrierobj) != true){
            $carrierExitBol = true;
            $carrierVal = $carrierobj->id;
         } else {
            $carrierVal = $carrierApi.'_E_E';
         }  

         // --------- TRANSI TIME ------------------------------------
         if(empty($transitimeApi) != true){
            $transitimeVal = $transitimeApi;
         } else {
            $transitimeVal = $transitimeApi.'_E_E';
         }         
         // --------- TRASNFER ---------------------------------------
         if(count($transferApi) == 1 || count($transferApi) == 0){
            $routetypeVal = 1;
         } else if(count($transferApi) > 1){
            $routetypeVal = 2;
         } 


         /*            $scheduleArr =  [
                'originBol'     => $originExitBol,
                'origin'        => $originVal,
                'destinyBol'    => $destinyExitBol,
                'destiny'       => $destinyVal,
                'etd'           => $etdVal,
                'eta'           => $etaVal,
                'voyage'        => $voyageVal,
                'vessel'        => $vesselVal,
                'carrierBol'    => $carrierExitBol,
                'carrier'       => $carrierVal,
                'transitimeVal' => $transitimeVal,
                'route_type'    => $routetypeVal,
                'account_id'    => $account->id
            ];            
*/


         if($originExitBol == true && $destinyExitBol == true && $carrierExitBol == true){

            $countexitSched   = Schedule::where('origin',$originVal)
               ->where('destination',$destinyVal)
               ->where('carrier_id',$carrierVal)
               ->where('vessel',$vesselVal)
               ->where('voyage',$voyageVal)
               ->where('route_type',$routetypeVal)
               //->where('via',$viaVal)
               ->where('etd',$etdVal)
               ->where('eta',$etaVal)
               ->where('transit_time',$transitimeVal)
               ->get();

            if(count($countexitSched) == 0){
               Schedule::create([
                  'origin'                => $originVal,
                  'destination'           => $destinyVal,
                  'carrier_id'            => $carrierVal,
                  'vessel'                => $vesselVal,
                  'voyage'                => $voyageVal,
                  'route_type'            => $routetypeVal,
                  'via'                   => 'N/A',
                  'etd'                   => $etdVal,
                  'eta'                   => $etaVal,
                  'transit_time'          => $transitimeVal,
                  'account_schedules_id'  => $account->id
               ]);
            }
         } else {
            //Fallidos

            // --------- ORIGIN ---------------------------------------------------------
            if($originExitBol == true){
               $originVal = Harbor::find($originVal);
               $originVal = $originVal->name;
            }

            // --------- DESTINATION ----------------------------------------------------
            if($destinyExitBol == true){
               $destinyVal = Harbor::find($destinyVal);
               $destinyVal = $destinyVal->name;
            }

            // --------- CARRIER --------------------------------------------------------
            if($carrierExitBol == true){
               $carrierVal = Carrier::find($carrierVal);
               $carrierVal = $carrierVal->name;
            }
            // --------- ROUTE TYPE -----------------------------------------------------

            $routetypeVal = RouteType::find($routetypeVal);
            $routetypeVal = $routetypeVal->name;                
            /*
                $scheduleFailArr =  [
                    'originBol'     => $originExitBol,
                    'origin'        => $originVal,
                    'destinyBol'    => $destinyExitBol,
                    'destiny'       => $destinyVal,
                    'etd'           => $etdVal,
                    'eta'           => $etaVal,
                    'voyage'        => $voyageVal,
                    'vessel'        => $vesselVal,
                    'carrierBol'    => $carrierExitBol,
                    'carrier'       => $carrierVal,
                    'transitimeVal' => $transitimeVal,
                    'route_type'    => $routetypeVal,
                    'account_id'    => $account->id
                ];   */


            FailedSchedule::create([
               'origin'                => $originVal,
               'destination'           => $destinyVal,
               'carrier'               => $carrierVal,
               'vessel'                => $vesselVal,
               'voyage'                => $voyageVal,
               'route_type'            => $routetypeVal,
               'via'                   => 'N/A',
               'etd'                   => $etdVal,
               'eta'                   => $etaVal,
               'transit_time'          => $transitimeVal,
               'account_schedules_id'  => $account->id
            ]);

            //dd($scheduleFailArr);
         }


      }
      $countSchedules      = Schedule::where('account_schedules_id',$account->id)->get();
      $countSchedulesfail  = FailedSchedule::where('account_schedules_id',$account->id)->get();

      $countSchedules      = count($countSchedules);
      $countSchedulesfail  = count($countSchedulesfail);

      $accountcount =  AccountSchedule::find($account->id);
      $accountcount->countschedule       = $countSchedules;
      $accountcount->countfailedschedule = $countSchedulesfail;
      $accountcount->update();
      //dd('listo');
       return new ScheduleResource(['name' => 'EventApi', 'status' => 200]);

   }
}
