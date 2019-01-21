<?php

namespace App\Http\Controllers;

use App\OauthClient;
use App\Credentialapi;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class PasswordGrantTokenController extends Controller
{

   public function index()
   {
      return view('password-grant-token.index');
   }


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

   public function credentialsapi(){

      return view('password-grant-token.credentialsapilist');
   }

   public function credentialsapiList(){
      $credentials = Credentialapi::with('carrier')->get();
      //dd($credentials->toArray());
      return DataTables::of($credentials)
         ->editColumn('carrier_id', function ($credentials) {
            return $credentials->carrier->name;
         })
         ->addColumn('action', function ($credentials) {
           /* return '<!--<a href="#" class="" onclick="showModal(1,'.$credentials['id'].',1)"><i class="fa fa-edit"></i></a>
                &nbsp-->
                <a href="#" data-id-passwd="'.$credentials['id'].'" class="delete-passwd"><i class="fa fa-trash"></i></a>';*/
         })
         ->editColumn('id', '{{$id}}')->toJson();
   }

   public function store(Request $request)
   {
      //
   }


   public function show($id)
   {
      //
   }


   public function edit($id)
   {
      //
   }


   public function update(Request $request, $id)
   {
      //
   }


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
