<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use PrvHarbor;
use App\Harbor;
use App\Carrier;
use App\Schedule;
use App\RouteType;
use App\FailedSchedule;
use App\AccountSchedule;


class ApiJob implements ShouldQueue
{
   use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
   protected $account, $dataGenArray;
   /**
     * Create a new job instance.
     *
     * @return void
     */
   public function __construct($dataGenArray,$account)
   {
      $this->account       = $account;
      $this->dataGenArray  = $dataGenArray;
   }

   /**
     * Execute the job.
     *
     * @return void
     */
   public function handle()
   {
      
      $account = $this->account;
      $dataGen = $this->dataGenArray;
      $scheduleColle = collect([]);
      foreach($dataGen as $data){

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
         $originMultBol  = $originApiArr['multiple'];
         $originVal      = $originApiArr['puerto'];

         // --------- DESTINATION ------------------------------------            
         $destinyArr = PrvHarbor::get_harbor_api($destinyApi);
         $destinyExitBol  = $destinyArr['boolean'];
         $destinyMultBol  = $destinyArr['multiple'];
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
                'account_id'    => $account['id']
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
                  'account_schedules_id'  => $account['id']
               ]);
            }
         } else {
            //Fallidos

            // --------- ORIGIN ---------------------------------------------------------
            if($originExitBol == true){
               $originVal = Harbor::find($originVal);
               $originVal = $originVal->name;
            }
             
             if($originMultBol == true){
               $originVal = $originApi.'_E_E';
            }

            // --------- DESTINATION ----------------------------------------------------
            if($destinyExitBol == true){
               $destinyVal = Harbor::find($destinyVal);
               $destinyVal = $destinyVal->name;
            }
             
             if($destinyMultBol == true){
               $destinyVal = $destinyApi.'_E_E';
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
               'account_schedules_id'  => $account['id']
            ]);

            //dd($scheduleFailArr);
         }


      }
      $countSchedules      = Schedule::where('account_schedules_id',$account['id'])->get();
      $countSchedulesfail  = FailedSchedule::where('account_schedules_id',$account['id'])->get();

      $countSchedules      = count($countSchedules);
      $countSchedulesfail  = count($countSchedulesfail);

      $accountcount =  AccountSchedule::find($account['id']);
      $accountcount->countschedule       = $countSchedules;
      $accountcount->countfailedschedule = $countSchedulesfail;
      $accountcount->update();
   }
}
