<?php

namespace App\Http\Controllers;

use PrvHarbor;
use App\Harbor;
use App\Carrier;
use App\Schedule;
use App\RouteType;
use App\FailedSchedule;
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

   /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
            return '<a href="#" class="" onclick="showModalsavetosurcharge('.$schedules['id'].','.$schedules['origin'].')"><i class="la la-edit"></i></a>
                &nbsp;
                <a href="#" id="delete-Fail-Surcharge" data-id-failSurcharge="'.$schedules['id'].'" class=""><i class="la la-remove"></i></a>';
         })
         ->editColumn('id', '{{$id}}')->toJson();
   }

   /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request)
   {
      //
   }

   /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
               return '<a href="#" class="" onclick="showModalsavetosurcharge('.$schedules['id'].','.$schedules['origin'].')"><i class="la la-edit"></i></a>
                &nbsp;
                <a href="#" id="delete-Fail-Surcharge" data-id-failSurcharge="'.$schedules['id'].'" class=""><i class="la la-remove"></i></a>';
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
            return '<a href="#" class="" onclick="showModal(2,'.$colleccion['id'].')"><i class="fa fa-edit"></i></a>
                &nbsp;
                <a href="#" id="" data-id-failedschedule="'.$colleccion['id'].'" class="delete-failedschedule"><i class="fa fa-trash"></i></a>';
         })
            ->editColumn('id', '{{$id}}')->toJson();
      }
   }


   public function ShowModal($id,$selector)
   {

      if($selector == 1){
         $schedule = '';
         $schedule = Schedule::find($id);

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
         $carriers   = Carrier::all()->pluck('name','id');
         $routetypes = RouteType::all()->pluck('name','id');
         $harbors    = Harbor::all()->pluck('name','id');
         return view('schedules.Body-Modals.editFail',compact('data','carriers','routetypes','harbors'));
      }


   }

   public function edit($id)
   {
      //
   }


   public function update(Request $request, $id)
   {
      //dd($request->all());

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

      $failedschedule = FailedSchedule::find($id);
      $failedschedule->delete();

      $request->session()->flash('message.nivel', 'success');
      $request->session()->flash('message.icon', 'check');
      $request->session()->flash('message.title', 'Well done!');
      return redirect()->route('schedule.show',$request->account_id);
   }


   public function destroy($id)
   {
      //
   }

   public function eliminar($id)
   {
      //try{
         $failedschedule = FailedSchedule::find($id);
         $failedschedule->delete();
         return 1;
      /*}catch(\Exception $e){
         return 2;
      }*/
   }
}
