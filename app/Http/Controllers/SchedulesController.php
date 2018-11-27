<?php

namespace App\Http\Controllers;

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
                    return '<a href="#" class="" onclick="showModalsavetosurcharge('.$colleccion['id'].','.$colleccion['origin'].')"><i class="la la-edit"></i></a>
                &nbsp;
                <a href="#" id="delete-Fail-Surcharge" data-id-failSurcharge="'.$colleccion['id'].'" class=""><i class="la la-remove"></i></a>';
                })
                ->editColumn('id', '{{$id}}')->toJson();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
