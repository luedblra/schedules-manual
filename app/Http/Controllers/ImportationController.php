<?php

namespace App\Http\Controllers;

use Excel;
use PrvHarbor;
use App\FileTmp;
use App\AccountSchedule;
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
      //dd($request->all());
      $name = $request->name;
      $date = $request->date;
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
      $transferBol = \Storage::disk('UpLoadFile')->put($nombre,\File::get($file));

      if($transferBol){
         $account = AccountSchedule::create([
            'name'  => $name,
            'date'  => $date

         ]);

         $filetmp = FileTmp::create([
            'namefile'              => $nombre,
            'account_schedules_id'  => $account->id
         ]);
      }

      $statustypecurren = $request->valuesCurrency;
      $targetsArr =[ 
         0 => "Origin", 
         1 => "Destination",
         2 => "carrier",
         3 => "Vessel",
         4 => "Voyage",
         5 => "Route Type",
         6 => "Via",
         7 => "Etd",
         8 => "Eta",
         9 => "Transit Time"
      ];


      $coordenates = collect([]);
      //ini_set('max_execution_time', 300);
      Excel::selectSheetsByIndex(0)
         ->Load(\Storage::disk('UpLoadFile')
                ->url($nombre),function($reader) use($request,$coordenates) {
                   $reader->noHeading = true;
                   $reader->ignoreEmpty();
                   $reader->takeRows(2);

                   $read = $reader->first();
                   $columna= array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','Ñ','O','P','Q','R','S','T','U','V');
                   for($i=0;$i<count($reader->first());$i++){
                      $coordenates->push($columna[$i].' '.$read[$i]);
                   }
                });

      $countTarges = count($targetsArr);

      return view('importation.loadview',compact('targetsArr',
                                                 'coordenates',
                                                 'countTarges',
                                                 'account',
                                                 'filetmp'
                                                ));
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
      //dd($request->all());

      $requestobj = $request->all();
      $NameFile   = $requestobj['file'];
      $path = public_path(\Storage::disk('UpLoadFile')->url($NameFile));
      $errors = 0;
      Excel::selectSheetsByIndex(0)
         ->Load($path,function($reader) use($requestobj,$errors,$NameFile) {
            $reader->noHeading = true;

            $accountid    = "accountid";
            $fileid       = "fileid";
            $origin       = "Origin";
            $destination  = "Destination";
            $carrier      = "carrier";
            $vessel       = "Vessel";
            $voyage       = "Voyage";
            $routetype    = "Route_Type";
            $via          = "Via";
            $etd          = "Etd";
            $eta          = "Eta";
            $transittime  = "Transit_Time";
            $i = 1;
            foreach($reader->get() as $read){
               if($i != 1){
                  dd($read);
               }
               $i++;
            }

         });
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
