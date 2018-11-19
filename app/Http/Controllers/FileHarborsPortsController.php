<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\Harbor;
use App\Harbor_copy;
use Illuminate\Support\Facades\Auth;
use Excel;
use Illuminate\Support\Facades\Log;
use Yajra\Datatables\Datatables;


class FileHarborsPortsController extends Controller
{


    public function index()
    {
        return  view('harbors.index');
    }


    public function create()
    {
        $harbors = Harbor::with('country')->get();
        return Datatables::of($harbors)
            ->addColumn('country_id', function ($harbor) {
                return $harbor->country['name'];
            })
            ->addColumn('action', function ($harbor) {
                return '<a href="#" data-id-edit="'.$harbor->id.'" onclick="showModal(2,'.$harbor->id.')" class=""><i class="fa fa-edit"></i></a>
                        &nbsp 
                        &nbsp  <a href="#" data-id-remove="'.$harbor->id.'" class="BorrarHarbor"><i class="fa  fa-trash-alt"></i></a>';
            })

            ->make();
    }

    public function loadviewAdd(){

        $country = Country::all()->pluck('name','id');
        return  view('harbors.Body-Modals.add',compact('country'));

    }    

    public function store(Request $request)
    {  

        foreach($request->variation as $variation){
            $arreglo[] =  strtolower($variation);
        }
        $type['type'] = $arreglo;
        $json = json_encode($type);

        $prueba = Harbor::create([
            'name'          => $request->name,
            'code'          => $request->code,
            'display_name'  => $request->display_name,
            'coordinates'   => $request->coordinate,
            'country_id'    => $request->country,
            'varation'      => $json
        ]);

        $request->session()->flash('message.nivel', 'success');
        $request->session()->flash('message.content', 'Your Harbor was created');
        return redirect()->route('UploadFile.index');

    }


    public function show($id)
    {
        $country = Country::all()->pluck('name','id');
        $harbors = Harbor::find($id);
        $decodejosn = json_decode($harbors->varation,true);
        $decodejosn = $decodejosn['type'];
        return  view('harbors.Body-Modals.edit',compact('country','harbors','decodejosn'));

    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {

        foreach($request->variation as $variation){
            $arreglo[] =  strtolower($variation);
        }

        $type['type'] = $arreglo;
        $json = json_encode($type);

        $harbor = Harbor::find($id);
        $harbor->name          = $request->name;
        $harbor->code          = $request->code;
        $harbor->display_name  = $request->display_name;
        $harbor->coordinates   = $request->coordinate;
        $harbor->country_id    = $request->country;
        $harbor->varation      = $json;
        $harbor->update();

        $request->session()->flash('message.nivel', 'success');
        $request->session()->flash('message.content', 'Your Harbor was updated');
        return redirect()->route('UploadFile.index');
    }


    public function destroyharbor($id)
    {
        try{
            $harbor = Harbor::find($id);
            $harbor->delete();
            return 1;
        }catch(\Exception $e){
            return 2;
        }
    }
}
