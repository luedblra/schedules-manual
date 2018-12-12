<?php

namespace App\Http\Controllers;

use PrvHarbor;
use App\Harbor;
use App\Carrier;
use App\Schedule;
use App\RouteType;
use App\FailedSchedule;
use App\AccountSchedule;
use App\Jobs\ReprocessSchedulesJob;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class SchedulesController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
   {
      return view('schedules.index');
   }


   public function create()
   {
      $schedules = Schedule::with('carrier','origen','destiny','routetype')->get();
      //dd($schedules[0]);
      return DataTables::of($schedules)

         ->editColumn('origin', function ($schedules){ 
            return $schedules['origen']['name'];
         })
         ->editColumn('destination', function ($schedules){ 
            return $schedules['destiny']['name'];
         })
         ->editColumn('carrier_id', function ($schedules){ 
            return $schedules['carrier']['name'];
         })
         ->editColumn('route_type', function ($schedules){ 
            return $schedules['routetype']['name'];
         })
         ->addColumn('action', function ($schedules) {
            return '<a href="#" class="" onclick="showModal(1,'.$schedules['id'].',1)"><i class="fa fa-edit"></i></a>
                &nbsp;
                <a href="#" data-id-schedule="'.$schedules['id'].'" class="delete-schedule"><i class="fa fa-trash"></i></a>';
         })
         ->editColumn('id', '{{$id}}')->toJson();
   }


   public function createtwo()
   {
      $carriers   = Carrier::all()->pluck('name','id');
      $routetypes = RouteType::all()->pluck('name','id');
      $harbors    = Harbor::all()->pluck('name','id');
      return view('schedules.Body-Modals.add',compact('carriers','routetypes','harbors'));
   }
   public function store(Request $request)
   {
      $schedule = new Schedule();
      $schedule->origin                = $request->origin;
      $schedule->destination           = $request->destination;
      $schedule->carrier_id            = $request->carrier;
      $schedule->vessel                = $request->vessel;
      $schedule->voyage                = $request->voyage;
      $schedule->route_type            = $request->routetype;
      $schedule->via                   = $request->via;
      $schedule->etd                   = $request->etd;
      $schedule->eta                   = $request->eta;
      $schedule->transit_time          = $request->transittime;
      $schedule->account_schedules_id  = $request->account_id;
      $schedule->save();

      $accountcount =  AccountSchedule::find($request->account_id);
      $accountcount->countschedule       = $accountcount['countschedule'] + 1;
      $accountcount->update();

      $request->session()->flash('message.nivel', 'success');
      $request->session()->flash('message.icon', 'check');
      $request->session()->flash('message.title', 'Well done!');

      return redirect()->route('schedule.index');
   }


   public function show($id){
      return view('schedules.indexForAccount',compact('id'));
   }

   public function GoodAndFailedSchedules($id,$selector)
   {
      if($selector == 1){
         $schedules = Schedule::where('account_schedules_id',$id)->with('carrier','origen','destiny','routetype')->get();
         //dd($schedules[0]);
         return DataTables::of($schedules)

            ->editColumn('origin', function ($schedules){ 
               return $schedules['origen']['name'];
            })
            ->editColumn('destination', function ($schedules){ 
               return $schedules['destiny']['name'];
            })
            ->editColumn('carrier_id', function ($schedules){ 
               return $schedules['carrier']['name'];
            })
            ->editColumn('route_type', function ($schedules){ 
               return $schedules['routetype']['name'];
            })
            ->addColumn('action', function ($schedules) {
               return '<a href="#" class="" onclick="showModal(1,'.$schedules['id'].',2)"><i class="fa fa-edit"></i></a>
                &nbsp;
                <a href="#" id="" data-id-schedule="'.$schedules['id'].'" class="delete-schedule"><i class="fa fa-trash"></i></a>';
            })
            ->editColumn('id', '{{$id}}')->toJson();
      } else if($selector == 2){

         $failedschedules = FailedSchedule::where('account_schedules_id',$id)->get();

         $colleccion = collect([]);
         $failedschedules = $failedschedules->toArray();
         foreach($failedschedules as $failedschedule){

            $originArr      = '';
            $destinationArr = '';
            $carrierArr     = '';
            $vesselArr      = '';
            $routetyprArr   = '';
            $etdArr         = '';
            $etaArr         = '';
            $transittimeArr = '';

            $originVal      = '';
            $destinationVal = '';
            $carrierVal     = '';
            $vesselVal      = '';
            $voyageVal      = '';
            $routetypeVal   = '';
            $etdVal         = '';
            $etaVal         = '';
            $viaVal         = '';
            $transittimeVal = '';

            $originArr      = explode('_',$failedschedule['origin']);
            $destinationArr = explode('_',$failedschedule['destination']);
            $carrierArr     = explode('_',$failedschedule['carrier']);
            $vesselArr      = explode('_',$failedschedule['vessel']);
            $routetyprArr   = explode('_',$failedschedule['route_type']);
            $etdArr         = explode('_',$failedschedule['etd']);
            $etaArr         = explode('_',$failedschedule['eta']);
            $transittimeArr = explode('_',$failedschedule['transit_time']);

            $voyageVal  = $failedschedule['voyage'];
            $viaVal     = $failedschedule['via'];

            // Origen -----------------------------------------------------

            if(count($originArr) <= 1){
               $originVal = $originArr[0];                    
            } else {
               $originVal = $originArr[0].'(Error)';
            }

            // Destino -----------------------------------------------------

            if(count($destinationArr) <= 1){
               $destinationVal = $destinationArr[0];
            } else {
               $destinationVal = $destinationArr[0].'(Error)';
            }

            // Carrier -----------------------------------------------------

            if(count($carrierArr) <= 1){
               $carrierVal = $carrierArr[0];
            } else {
               $carrierVal = $carrierArr[0].'(Error)';                    
            }

            // Vessel ------------------------------------------------------

            if(count($vesselArr) <= 1){
               $vesselVal = $vesselArr[0];
            } else {
               $vesselVal = $vesselArr[0].'(Error)';                    
            }

            // Route Type---------------------------------------------------

            if(count($routetyprArr) <= 1){
               $routetypeVal = $routetyprArr[0];
            } else {
               $routetypeVal = $routetyprArr[0].'(Error)';                    
            }

            // Etd ---------------------------------------------------------

            if(count($etdArr) <= 1){
               $etdVal = $etdArr[0];
            } else {
               $etdVal = $etdArr[0].'(Error)';
            }

            // Eta ----------------------------------------------------------

            if(count($etaArr) <= 1){
               $etaVal = $etaArr[0];
            } else {
               $etaVal = $etaArr[0].'(Error)';
            }

            // Transit Time -------------------------------------------------

            if(count($transittimeArr) <= 1){
               $transittimeVal = $transittimeArr[0];
            } else {
               $transittimeVal = $transittimeArr[0].'(Error)';
            }

            $data = [
               'id'            => $failedschedule['id'],
               'origin'        => $originVal,
               'destination'   => $destinationVal,
               'carrier'       => $carrierVal,
               'vessel'        => $vesselVal,
               'voyage'        => $voyageVal,
               'route_type'    => $routetypeVal,
               'via'           => $viaVal,
               'etd'           => $etdVal,
               'eta'           => $etaVal,
               'transit_time'  => $transittimeVal
            ];

            $colleccion->push($data);
         }


         return DataTables::of($colleccion)->addColumn('action', function ($colleccion) {
            return '<a href="#" class="" onclick="showModal(2,'.$colleccion['id'].',3)"><i class="fa fa-edit"></i></a>
                &nbsp;
                <a href="#" id="" data-id-failedschedule="'.$colleccion['id'].'" class="delete-failedschedule"><i class="fa fa-trash"></i></a>';
         })
            ->editColumn('id', '{{$id}}')->toJson();
      }
   }


   public function ShowModal($id,$selector,$selectorRet)
   {

      $carriers   = Carrier::all()->pluck('name','id');
      $routetypes = RouteType::all()->pluck('name','id');
      $harbors    = Harbor::all()->pluck('name','id');

      if($selector == 1){
         $schedule = '';
         $schedule = Schedule::find($id);
         //dd($schedule);
         return view('schedules.Body-Modals.edit',compact('schedule','carriers','routetypes','harbors','selectorRet'));

      } else{
         $failedschedule = '';
         $failedschedule = FailedSchedule::find($id);

         $originArr      = '';
         $destinationArr = '';
         $carrierArr     = '';
         $vesselArr      = '';
         $routetyprArr   = '';
         $etdArr         = '';
         $etaArr         = '';
         $transittimeArr = '';

         $originVal      = '';
         $destinationVal = '';
         $carrierVal     = '';
         $vesselVal      = '';
         $voyageVal      = '';
         $routetypeVal   = '';
         $etdVal         = '';
         $etaVal         = '';
         $viaVal         = '';
         $transittimeVal = '';

         $originClass      = 'color:green';
         $destinationClass = 'color:green';
         $carrierClass     = 'color:green';
         $vesselClass      = 'color:green';
         $voyageClass      = 'color:green';
         $routetypeClass   = 'color:green';
         $etdClass         = 'color:green';
         $etaClass         = 'color:green';
         $viaClass         = 'color:green';
         $transittimeClass = 'color:green';

         $originArr      = explode('_',$failedschedule['origin']);
         $destinationArr = explode('_',$failedschedule['destination']);
         $carrierArr     = explode('_',$failedschedule['carrier']);
         $vesselArr      = explode('_',$failedschedule['vessel']);
         $routetyprArr   = explode('_',$failedschedule['route_type']);
         $etdArr         = explode('_',$failedschedule['etd']);
         $etaArr         = explode('_',$failedschedule['eta']);
         $transittimeArr = explode('_',$failedschedule['transit_time']);

         $voyageVal  = $failedschedule['voyage'];
         $viaVal     = $failedschedule['via'];

         // Origen -----------------------------------------------------

         if(count($originArr) <= 1){
            $originArr  = PrvHarbor::get_harbor($originArr[0]);
            $originVal  = $originArr['puerto'];                    
         } else {
            $originClass   = 'color:red';
            $originVal     = '';
         }

         // Destino -----------------------------------------------------

         if(count($destinationArr) <= 1){
            $destinationArr = PrvHarbor::get_harbor($destinationArr[0]);
            $destinationVal = $destinationArr['puerto'];

         } else {
            $destinationClass = 'color:red';
            $destinationVal   = '';
         }

         // Carrier -----------------------------------------------------

         if(count($carrierArr) <= 1){
            $carreireobj   = Carrier::where('name',$carrierArr[0])->first();
            $carrierVal    = $carreireobj['id'];
         } else {
            $carrierClass  = 'color:red';
            $carrierVal    = $carrierArr[0].'(Error)';                    
         }

         // Vessel ------------------------------------------------------

         if(count($vesselArr) <= 1){
            $vesselVal = $vesselArr[0];
         } else {
            $vesselClass   = 'color:red';
            $vesselVal     = $vesselArr[0].'(Error)';                    
         }

         // Route Type---------------------------------------------------

         if(count($routetyprArr) <= 1){
            $routetypeobj = RouteType::where('name',$routetyprArr[0])->first();
            $routetypeVal = $routetypeobj['id'];
         } else {
            $routetypeClass   = 'color:red';
            $routetypeVal     = $routetyprArr[0].'(Error)';                    
         }

         // Etd ---------------------------------------------------------

         if(count($etdArr) <= 1){
            $etdVal = $etdArr[0];
         } else {
            $etdClass   = 'color:red';
            $etdVal     = $etdArr[0].'(Error)';
         }

         // Eta ----------------------------------------------------------

         if(count($etaArr) <= 1){
            $etaVal = $etaArr[0];
         } else {
            $etaClass   = 'color:red';
            $etaVal     = $etaArr[0].'(Error)';
         }

         // Transit Time -------------------------------------------------

         if(count($transittimeArr) <= 1){
            $transittimeVal = $transittimeArr[0];
         } else {
            $transittimeClass = 'color:red';
            $transittimeVal   = $transittimeArr[0].'(Error)';
         }

         $data = [
            'id'            => $failedschedule['id'],
            'origin'        => $originVal,
            'destination'   => $destinationVal,
            'carrier'       => $carrierVal,
            'vessel'        => $vesselVal,
            'voyage'        => $voyageVal,
            'route_type'    => $routetypeVal,
            'via'           => $viaVal,
            'etd'           => $etdVal,
            'eta'           => $etaVal,
            'transit_time'  => $transittimeVal,
            'account_id'    => $failedschedule['account_schedules_id'],

            'originClass'      => $originClass,
            'destinationClass' => $destinationClass,
            'carrierClass'     => $carrierClass,
            'vesselClass'      => $vesselClass,
            'voyageClass'      => $voyageClass,
            'routetypeClass'   => $routetypeClass,
            'etdClass'         => $etdClass,
            'etaClass'         => $etaClass,
            'viaClass'         => $viaClass,
            'transittimeClass' => $transittimeClass
         ];

         //dd($data);

         return view('schedules.Body-Modals.editFail',compact('data','carriers','routetypes','harbors','selectorRet'));
      }


   }

   public function edit(Request $request, $id)
   {
      $failedschedules = FailedSchedule::where('account_schedules_id',$id)->get();
      $failedschedules = $failedschedules->toArray();
      if(count($failedschedules) >= 250){
         ReprocessSchedulesJob::dispatch($id);
         $request->session()->flash('message.nivel', 'success');
         $request->session()->flash('message.icon', 'check');
         $request->session()->flash('message.title', 'The schedules are reprocessing in the background!');
         return  redirect()->route('schedule.show',$id);
      } else{
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

         $request->session()->flash('message.nivel', 'success');
         $request->session()->flash('message.icon', 'check');
         $request->session()->flash('message.title', 'The schedules was reprocess!');
         return  redirect()->route('schedule.show',$id);
      }
   }


   public function update(Request $request, $id)
   {
      //dd($request->all());
      if($request->selector == 1){

         $schedule = Schedule::find($id);
         $schedule->origin                = $request->origin;
         $schedule->destination           = $request->destination;
         $schedule->carrier_id            = $request->carrier;
         $schedule->vessel                = $request->vessel;
         $schedule->voyage                = $request->voyage;
         $schedule->route_type            = $request->routetype;
         $schedule->via                   = $request->via;
         $schedule->etd                   = $request->etd;
         $schedule->eta                   = $request->eta;
         $schedule->transit_time          = $request->transittime;
         $schedule->update();

      } else if ($request->selector == 2){

         $schedule = new Schedule();
         $schedule->origin                = $request->origin;
         $schedule->destination           = $request->destination;
         $schedule->carrier_id            = $request->carrier;
         $schedule->vessel                = $request->vessel;
         $schedule->voyage                = $request->voyage;
         $schedule->route_type            = $request->routetype;
         $schedule->via                   = $request->via;
         $schedule->etd                   = $request->etd;
         $schedule->eta                   = $request->eta;
         $schedule->transit_time          = $request->transittime;
         $schedule->account_schedules_id  = $request->account_id;
         $schedule->save();

         $accountcount =  AccountSchedule::find($request->account_id);
         $accountcount->countschedule       = $accountcount['countschedule'] + 1;
         $accountcount->countfailedschedule = $accountcount['countfailedschedule'] - 1;
         $accountcount->update();

         $failedschedule = FailedSchedule::find($id);
         $failedschedule->delete();

      }

      $request->session()->flash('message.nivel', 'success');
      $request->session()->flash('message.icon', 'check');
      $request->session()->flash('message.title', 'Well done!');

      if($request->selector == 1){
         if($request->selectorRet == 1){
            return redirect()->route('schedule.index');
         } else if ($request->selectorRet == 2){
            return redirect()->route('schedule.show',$request->account_id);
         }
      } else if ($request->selector == 2){
         return redirect()->route('schedule.show',$request->account_id);
      }
   }


   public function destroy($id)
   {
      //
   }

   public function eliminar($id,$selector)
   {
      if($selector == 1){
         try{
            $schedule = Schedule::find($id);
            $accountcount =  AccountSchedule::find($schedule['account_schedules_id']);
            $accountcount->countschedule = $accountcount['countschedule'] - 1;
            $accountcount->update();
            $schedule->delete();
            return 1;
         }catch(\Exception $e){
            return 2;
         }
      } else if($selector == 2){

         try{
            $failedschedule = FailedSchedule::find($id);
            $accountcount =  AccountSchedule::find($failedschedule['account_schedules_id']);
            $accountcount->countfailedschedule = $accountcount['countfailedschedule'] - 1;
            $accountcount->update();
            $failedschedule->delete();
            return 1;
         }catch(\Exception $e){
            return 2;
         }
      }
   }
}
