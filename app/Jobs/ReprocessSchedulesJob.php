<?php

namespace App\Jobs;

use PrvHarbor;
use App\Carrier;
use App\Schedule;
use App\RouteType;
use App\FailedSchedule;
use App\AccountSchedule;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ReprocessSchedulesJob implements ShouldQueue
{
   use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
   protected $id;
   /**
     * Create a new job instance.
     *
     * @return void
     */
   public function __construct($id)
   {
      $this->id = $id;
   }

   /**
     * Execute the job.
     *
     * @return void
     */
   public function handle()
   {
      $id = $this->id;
      $failedschedules = FailedSchedule::where('account_schedules_id',$id)->get();
      $failedschedules = $failedschedules->toArray();

      foreach($failedschedules as $failedschedule){

         // Variables 

         $originVal        = '';
         $destinationVal   = '';
         $carrierVal       = '';
         $vesselVal        = '';
         $voyageVal        = '';
         $routetypeVal     = '';
         $viaVal           = '';
         $etdVal           = '';
         $etaVal           = '';
         $transittimeVal   = '';

         // Declaraciones tipo Booleanas
         $originBol        = false;
         $destinationBol   = false;
         $carrierBol       = false;
         $vesselBol        = false;
         $routetypeBol     = false;
         $etdVBol          = false;
         $etaVBol          = false;
         $transittimeBol   = false;

         // EXPLODES --------------------------------------------------------------------------

         $originVal        = explode('_',$failedschedule['origin']);
         $destinationVal   = explode('_',$failedschedule['destination']);
         $carrierVal       = explode('_',$failedschedule['carrier']);
         $vesselVal        = explode('_',$failedschedule['vessel']);
         $routetypeVal     = explode('_',$failedschedule['route_type']);
         $etdVal           = explode('_',$failedschedule['etd']);
         $etaVal           = explode('_',$failedschedule['eta']);
         $transittimeVal   = explode('_',$failedschedule['transit_time']);

         // ORIGIN ----------------------------------------------------------------------------

         $originArr  = PrvHarbor::get_harbor($originVal[0]);
         $originBol  = $originArr['boolean'];
         $originVal  = $originArr['puerto'];

         // DESTINATION -----------------------------------------------------------------------

         $destinationArr = PrvHarbor::get_harbor($destinationVal[0]);
         $destinationBol = $destinationArr['boolean'];
         $destinationVal = $destinationArr['puerto'];


         // CARRIER ---------------------------------------------------------------------------

         if(count($carrierVal) <= 1){  
            $carrier = Carrier::where('name','=',$carrierVal[0])->first();
            $carrierBol = true;
            $carrierVal = $carrier->id;
         } else {
            $carrierVal = $carrierVal[0].'_E_E';
         }

         // VESSEL ----------------------------------------------------------------------------

         if(count($vesselVal) <= 1){
            $vesselBol = true;
            $vesselVal = $vesselVal[0];
         }else{
            $vesselVal = $vesselVal[0].'_E_E';
         }


         // VOYAGE ----------------------------------------------------------------------------

         if(empty($failedschedule['voyage']) != true){
            $voyageVal = $failedschedule['voyage'];
         }else{
            $voyageVal = $failedschedule['voyage'].'_E_E';
         }
         //-----------
         // ROUTE TYPE ------------------------------------------------------------------------

         if(count($routetypeVal) <= 1){
            $routetype = RouteType::where('name','=',$routetypeVal[0])->first();
            $routetypeBol = true;
            $routetypeVal = $routetype->id;

         } else{
            $routetypeVal = $routetypeVal.'_E_E';

         }
         // VIA -------------------------------------------------------------------------------

         if(empty($failedschedule['via']) != true){
            $viaVal = $failedschedule['via'];
         }else{
            $viaVal = $failedschedule['via'];
         }

         // ETD -------------------------------------------------------------------------------

         if(count($etdVal) <= 1){
            $etdVBol = true;
            $etdVal = date("Y-m-d", strtotime($etdVal[0]));
         }else{
            $etdVal = $etdVal[0].'_E_E';
         }


         // ETa -------------------------------------------------------------------------------

         if(count($etaVal) <= 1){
            $etaVBol = true;
            $etaVal = date("Y-m-d", strtotime($etaVal[0]));
         }else{
            $etaVal = $etaVal[0].'_E_E';
         }

         // TRANSIT TIME ----------------------------------------------------------------------

         if(count($transittimeVal) <= 1){
            $transittimeBol = true;
            $transittimeVal = (INT)$transittimeVal[0];
         }else{
            $transittimeVal = $transittimeVal[0].'_E_E';
         }

         /*
         $data = [
            'OrigenVal'       => $originVal,
            'origenBol'       => $originBol,
            'DestinoVal'      => $destinationVal,
            'DestinoBol'      => $destinationBol,
            'CarrierVal'      => $carrierVal,
            'carrierBol'      => $carrierBol,
            'VesselVal'       => $vesselVal,
            'vesselBol'       => $vesselBol,
            'VoyageVal'       => $voyageVal,
            'routetypeVal'    => $routetypeVal,
            'routetypeBol'    => $routetypeBol,
            'viaVal'          => $viaVal,
            'etdVal'          => $etdVal,
            'etdVBol'         => $etdVBol,
            'etaVal'          => $etaVal,
            'etaVBol'         => $etaVBol,
            'transittimeVal'  => $transittimeVal,
            'transittimeBol'  => $transittimeBol,
         ];
*/

         if($originBol == true && $destinationBol == true && $carrierBol == true &&
            $vesselBol == true && $routetypeBol == true && $etdVBol == true &&
            $etaVBol == true && $transittimeBol == true ){

            // Validacion para verifcar si ya no existe en la tabla ----------------------------------
            $countexitSched   = Schedule::where('origin',$originVal)
               ->where('destination',$destinationVal)
               ->where('carrier_id',$carrierVal)
               ->where('vessel',$vesselVal)
               ->where('voyage',$voyageVal)
               ->where('route_type',$routetypeVal)
               ->where('via',$viaVal)
               ->where('etd',$etdVal)
               ->where('eta',$etaVal)
               ->where('transit_time',$transittimeVal)
               ->get();

            if(count($countexitSched) == 0){
               Schedule::create([
                  'origin'                => $originVal,
                  'destination'           => $destinationVal,
                  'carrier_id'            => $carrierVal,
                  'vessel'                => $vesselVal,
                  'voyage'                => $voyageVal,
                  'route_type'            => $routetypeVal,
                  'via'                   => $viaVal,
                  'etd'                   => $etdVal,
                  'eta'                   => $etaVal,
                  'transit_time'          => $transittimeVal,
                  'account_schedules_id'  => $id
               ]);
            }
            $failedscheduleobj = FailedSchedule::find($failedschedule['id']);
            $failedscheduleobj->delete();

         }
      }
      
        $countSchedules      = Schedule::where('account_schedules_id',$id)->get();
         $countSchedulesfail  = FailedSchedule::where('account_schedules_id',$id)->get();

         $countSchedules      = count($countSchedules);
         $countSchedulesfail  = count($countSchedulesfail);

         $accountcount =  AccountSchedule::find($id);
         $accountcount->countschedule       = $countSchedules;
         $accountcount->countfailedschedule = $countSchedulesfail;
         $accountcount->update();
      
   }
}
