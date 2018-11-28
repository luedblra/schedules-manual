<?php

namespace App\Http\Controllers;

use App\AccountSchedule;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;


class AccountSchedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('accounts-schedules.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accounts = AccountSchedule::all();

        return DataTables::of($accounts)
            ->editColumn('date', function ($accounts){ 
                return \date( 'd-m-Y',strtotime($accounts['date']));
            })
            ->addColumn('action', function ($accounts) {
                return '<!--<a href="#" class="" onclick="showModalsavetosurcharge('.$accounts['id'].','.$accounts['name'].')"><i class="fa fa-edit"></i></a>-->
                &nbsp;
                &nbsp;
                &nbsp;
                <a href="#" class="delete-account" data-id-account="'.$accounts['id'].'" ><i class="fa fa-trash"></i></a>
                &nbsp;
                &nbsp;
                &nbsp;
                <a href="/Schedules/schedule/'.$accounts['id'].'" class=""><i class="fa fa-eye"></i></a>';
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
    
      public function eliminar($id)
    {
        try{
            $account = AccountSchedule::find($id);
            $account->delete();
            return 1;
        }catch(\Exception $e){
            return 2;
        }
    }
}