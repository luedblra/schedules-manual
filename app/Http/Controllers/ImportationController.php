<?php

namespace App\Http\Controllers;

use Excel;
use PrvHarbor;
use App\Harbor;
use App\FileTmp;
use App\Carrier;
use App\Schedule;
use App\RouteType;
use App\FailedSchedule;
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
            ->Load($path,function($reader) use($requestobj,$errors,$NameFile,$request) {
                $reader->noHeading = true;

                $accountidR    = $requestobj["accountid"];
                $fileidR       = $requestobj["fileid"];
                $originR       = $requestobj["Origin"];
                $destinationR  = $requestobj["Destination"];
                $carrierR      = $requestobj["carrier"];
                $vesselR       = $requestobj["Vessel"];
                $voyageR       = $requestobj["Voyage"];
                $routetypeR    = $requestobj["Route_Type"];
                $viaR          = $requestobj["Via"];
                $etdR          = $requestobj["Etd"];
                $etaR          = $requestobj["Eta"];
                $transittimeR  = $requestobj["Transit_Time"];

                $i = 1;
                foreach($reader->get() as $read){
                    if($i != 1){
                        // Declaraciones tipo variables
                        $originVal        = '';
                        $destinationVal   = '';
                        $carrierVal       = '';
                        $vesselVal        = '';
                        $voyageVal        = '';
                        $routetypeVal     = '';
                        $viaVal           = '';
                        $etdVal           = '';
                        $etaVal           = '';
                        $transittimeVal   = '';


                        // Declaraciones tipo Arreglos
                        $originArr        = '';
                        $destinationArr   = '';



                        // Declaraciones tipo Booleanas
                        $originBol        = false;
                        $destinationBol   = false;
                        $carrierBol       = false;
                        $vesselBol        = false;
                        $routetypeBol     = false;
                        $etdVBol          = false;
                        $etaVBol          = false;
                        $transittimeBol   = false;


                        // CARACTERES A ELIMINAR -------------------------------------------------------------
                        $caracteres = ['*','/','.','?','"',1,2,3,4,5,6,7,8,9,0,'{','}','[',']','+','_','|','°','!','$','%','&','(',')','=','¿','¡',';','>','<','^','`','¨','~',':'];

                        $caracteresTime = ['*','.','?','"','{','}','[',']','+','_','|','°','!','$','%','&','(',')','=','¿','¡',';','>','<','^','`','¨','~',':','a','b','c','d','e','f','g','h','i','j','k','l','m','n','ñ','o','p','q','r','s','t','u','v','w','x','y','z','°','¬','@','·','½'];

                        // ORIGIN ----------------------------------------------------------------------------

                        $originArr  = PrvHarbor::get_harbor($read[$originR]);
                        $originBol  = $originArr['boolean'];
                        $originVal  = $originArr['puerto'];

                        // DESTINATION -----------------------------------------------------------------------

                        $destinationArr = PrvHarbor::get_harbor($read[$destinationR]);
                        $destinationBol = $destinationArr['boolean'];
                        $destinationVal = $destinationArr['puerto'];

                        // CARRIER ---------------------------------------------------------------------------

                        $carrierVal   = $read[$carrierR];
                        $carrierResul = str_replace($caracteres,'',$carrierVal);
                        $carrier = Carrier::where('name','=',$carrierResul)->first();
                        if(empty($carrier->id) != true){
                            $carrierBol = true;
                            $carrierVal = $carrier->id;
                        }else{
                            $carrierVal = $carrierVal.'_E_E';
                        }


                        // VESSEL ----------------------------------------------------------------------------

                        if(empty($read[$vesselR]) != true){
                            $vesselBol = true;
                            $vesselVal = $read[$vesselR];
                        }else{
                            $vesselVal = $read[$vesselR].'_E_E';
                        }

                        // VOYAGE ----------------------------------------------------------------------------

                        if(empty($read[$voyageR]) != true){
                            $voyageVal = $read[$voyageR];
                        }else{
                            $voyageVal = '';

                        }

                        // ROUTE TYPE ------------------------------------------------------------------------

                        $routetypeVal  = $read[$routetypeR];
                        $routetypResul = str_replace($caracteres,'',$read[$routetypeR]);
                        $routetype = RouteType::where('name','=',$routetypResul)->first();
                        if(empty($routetype->id) != true){
                            $routetypeBol = true;
                            $routetypeVal = $routetype->id;
                        }else{
                            $routetypeVal = $routetypeVal.'_E_E';
                        }

                        // VIA -------------------------------------------------------------------------------

                        if(empty($read[$viaR]) != true){
                            $viaVal = $read[$viaR];
                        }else{
                            $viaVal = '';
                        }

                        // ETD -------------------------------------------------------------------------------

                        if(empty($read[$etdR]) != true){
                            $etdVBol = true;
                            $etdVal = $read[$etdR];
                            $etdVal = str_replace('/','-',$etdVal);
                            $etdVal = str_replace($caracteresTime,'',$etdVal);
                            $etdVal = date("Y-m-d", strtotime($etdVal));
                        }else{
                            $etdVal = $read[$etdR].'_E_E';
                        }


                        // ETa -------------------------------------------------------------------------------

                        if(empty($read[$etaR]) != true){
                            $etaVBol = true;
                            $etaVal = $read[$etaR];
                            $etaVal = str_replace('/','-',$etaVal);
                            $etaVal = str_replace($caracteresTime,'',$etaVal);
                            $etaVal = date("Y-m-d", strtotime($etaVal));
                        }else{
                            $etaVal = $read[$etaR].'_E_E';
                        }

                        // VIA -------------------------------------------------------------------------------

                        if(empty($read[$transittimeR]) != true){
                            $transittimeBol = true;
                            $transittimeVal = (int)$read[$transittimeR];
                        }else{
                            $transittimeVal = $read[$transittimeR].'_E_E';
                        }
                        /*
                  $data = [
                     'OrigenVal'       => $originVal,
                     'origenBol'       => $originBol,
                     'DestinoVal'      => $destinationVal,
                     'DestinoBol'      => $destinationBol,
                     'CarrierVal'      => $carrierVal,
                     'carrierBol'      => $carrierBol,
                     'VesselVal'       => $vesselVal,
                     'vesselBol'       => $vesselBol,
                     'VoyageVal'       => $voyageVal,
                     'routetypeVal'    => $routetypeVal,
                     'routetypeBol'    => $routetypeBol,
                     'viaVal'          => $viaVal,
                     'etdVal'          => $etdVal,
                     'etdVBol'         => $etdVBol,
                     'etaVal'          => $etaVal,
                     'etaVBol'         => $etaVBol,
                     'transittimeVal'  => $transittimeVal,
                     'transittimeBol'  => $transittimeBol,
                  ];

                  dd($data);*/

                        if($originBol == true && $destinationBol == true 
                           && $carrierBol == true && $vesselBol == true
                           && $routetypeBol == true && $etdVBol == true
                           && $etaVBol == true && $transittimeBol == true){ // Registros que estan totalmente validados (GOOD) **********

                            // Validacion para verifcar si ya no existe en la tabla ----------------------------------
                            $countexitSched   = Schedule::where('origin',$originVal)
                                ->where('destination',$destinationVal)
                                ->where('carrier_id',$carrierVal)
                                ->where('vessel',$vesselVal)
                                ->where('voyage',$voyageVal)
                                ->where('route_type',$routetypeVal)
                                ->where('via',$viaVal)
                                ->where('etd',$etdVal)
                                ->where('eta',$etaVal)
                                ->where('transit_time',$transittimeVal)
                                ->get();

                            if(count($countexitSched) == 0){
                                Schedule::create([
                                    'origin'                => $originVal,
                                    'destination'           => $destinationVal,
                                    'carrier_id'            => $carrierVal,
                                    'vessel'                => $vesselVal,
                                    'voyage'                => $voyageVal,
                                    'route_type'            => $routetypeVal,
                                    'via'                   => $viaVal,
                                    'etd'                   => $etdVal,
                                    'eta'                   => $etaVal,
                                    'transit_time'          => $transittimeVal,
                                    'account_schedules_id'  => $accountidR
                                ]);
                            }

                        } else { // Registros que estan fallidos  (FAIL) *********************************************************


                            // ORIGIN -------------------------------------------------------------------------

                            if($originBol){
                                $originObj = Harbor::find($originVal);
                                $originVal = $originObj['name'];
                            }

                            // DESTINATION --------------------------------------------------------------------

                            if($destinationBol){
                                $destinationObj = Harbor::find($destinationVal);
                                $destinationVal = $destinationObj['name'];
                            }

                            // CARRIER ------------------------------------------------------------------------

                            if($carrierBol){
                                $carrierObj = Carrier::find($carrierVal);
                                $carrierVal = $carrierObj['name'];
                            }

                            // ROUTE TYPE ---------------------------------------------------------------------

                            if($routetypeBol){
                                $routetypeObj = RouteType::find($routetypeVal);
                                $routetypeVal = $routetypeObj['name'];
                            }

                            // Validacion para verifcar si ya no existe en la tabla ----------------------------------

                            $countexitSchedFailed = FailedSchedule::where('origin',$originVal)
                                ->where('destination',$destinationVal)
                                ->where('carrier',$carrierVal)
                                ->where('vessel',$vesselVal)
                                ->where('voyage',$voyageVal)
                                ->where('route_type',$routetypeVal)
                                ->where('via',$viaVal)
                                ->where('etd',$etdVal)
                                ->where('eta',$etaVal)
                                ->where('transit_time',$transittimeVal)
                                ->get();

                            if(count($countexitSchedFailed) == 0){

                                FailedSchedule::create([
                                    'origin'                => $originVal,
                                    'destination'           => $destinationVal,
                                    'carrier'               => $carrierVal,
                                    'vessel'                => $vesselVal,
                                    'voyage'                => $voyageVal,
                                    'route_type'            => $routetypeVal,
                                    'via'                   => $viaVal,
                                    'etd'                   => $etdVal,
                                    'eta'                   => $etaVal,
                                    'transit_time'          => $transittimeVal,
                                    'account_schedules_id'  => $accountidR
                                ]);

                                $errors++;
                            }
                        }
                    }
                    $i++;
                }

                $request->session()->flash('message.content', 'your file was processed. '.$errors.' Erros.');
                
                if($errors > 0){

                    $request->session()->flash('message.nivel', 'danger');
                    $request->session()->flash('message.icon', 'warning');
                } else {

                    $request->session()->flash('message.nivel', 'success');
                    $request->session()->flash('message.icon', 'check');
                }
            });
        $request->session()->flash('message.title', 'Well done!');
        return redirect()->route('list.schedules');
    }

    public function showall()
    {
        return view('schedules.index');
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
