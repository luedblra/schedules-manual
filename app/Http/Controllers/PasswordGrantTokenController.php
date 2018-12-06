<?php

namespace App\Http\Controllers;

use App\OauthClient;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class PasswordGrantTokenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('password-grant-token.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $oauthclient = OauthClient::all();

        return DataTables::of($oauthclient)
            ->addColumn('action', function ($oauthclient) {
                return '<!--<a href="#" class="" onclick="showModal(1,'.$oauthclient['id'].',1)"><i class="fa fa-edit"></i></a>
                &nbsp-->
                <a href="#" data-id-passwd="'.$oauthclient['id'].'" class="delete-passwd"><i class="fa fa-trash"></i></a>';
            })
            ->editColumn('id', '{{$id}}')->toJson();
        //
    }


    public function createtwo()
    {
        return view('password-grant-token.Body-Modals.add');
    }

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
            $oauthclient = OauthClient::find($id);
            $oauthclient->delete();
            return 1;
        }catch(\Exception $e){
            return 2;
        }

    }
}
