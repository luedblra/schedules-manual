<?php

namespace App\Http\Controllers;

use Excel;
use Illuminate\Http\Request;

class ImportationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('importation.index');
    }


    public function uploadSchedules(Request $request)
    {
        dd($request->all());

        $now = new \DateTime();
        $now = $now->format('dmY_His');
        $file = $request->file('file');
        $ext = strtolower($file->getClientOriginalExtension());
        $validator = \Validator::make(
            array('ext' => $ext),
            array('ext' => 'in:xls,xlsx,csv')
        );
        $Contract_id;
        if ($validator->fails()) {
            $request->session()->flash('message.nivel', 'danger');
            $request->session()->flash('message.content', 'just archive with extension xlsx xls csv');
            return redirect()->route('importation.index');
        }

        $nombre = $file->getClientOriginalName();
        $nombre = $now.'_'.$nombre;
        $nombre = str_replace(' ','_',$nombre);
        \Storage::disk('UpLoadFile')->put($nombre,\File::get($file));
    }

    public function create()
    {
        Excel::selectSheetsByIndex(0)
            ->Load(\Storage::disk('UpLoadFile')
                   ->url('test.xlsx'),function($reader)  {
                       dd($reader);

                   });
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
}
