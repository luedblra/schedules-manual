<?php

namespace App\Http\Controllers;

use App\Carrier;
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
            return '
                <a href="#" onclick="showModal('.$credentials['id'].')"><span class="fa fa-edit"></span></a>';
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
      $carriers = Carrier::all()->pluck('name','id');
      $credential = Credentialapi::find($id);
      //dd($credential);
      return view('password-grant-token.Body-Modals.edit',compact('credential','carriers'));
   }


   public function update(Request $request, $id)
   {
       $credential = Credentialapi::find($id);
      //dd($request->toArray());
      $credential->auth_post     = $request->auth_post;
      $credential->client_id     = $request->client_id;
      $credential->client_secret = $request->client_secret;
      $credential->user_name     = $request->user_name;
      $credential->password      = $request->password;
      $credential->url           = $request->url;
      $credential->carrier_id    = $request->carrier_id;
      $credential->description   = $request->description;
      $credential->update();

      return redirect()->route('index.credential.api')->with('success','Credential Updated');
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
