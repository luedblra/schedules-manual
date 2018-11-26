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


      $schedules = Schedule::with('carrier','origen','destination')->get();
      //dd($schedules);
      return DataTables::of($schedules)->addColumn('action', function ($schedules) {
         return '<a href="#" class="" onclick="showModalsavetosurcharge('.$schedules['id'].','.$schedules['origin'].')"><i class="la la-edit"></i></a>
                &nbsp;
                <a href="#" id="delete-Fail-Surcharge" data-id-failSurcharge="'.$schedules['id'].'" class=""><i class="la la-remove"></i></a>';
      })
         ->editColumn('id', 'ID: {{$id}}')->toJson();
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
   public function show($id)
   {
      //
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
