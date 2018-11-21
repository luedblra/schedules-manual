<?php
//app/Helpers/Envato/User.php
namespace App\Helpers;
 
use App\Harbor;
 
class Helpharbors {
    /**
     * @param int $user_id User-id
     * 
     * @return string
     */
    public static function get_harbor($puerto) {
            
        $portExiBol = false;
        $sin_via = explode(' via ',$puerto);

        $caracteres = ['*','/','.','?','"',1,2,3,4,5,6,7,8,9,0,'{','}','[',']','+','_','|','°','!','$','%','&','(',')','=','¿','¡',';','>','<','^','`','¨','~',':'];


        $portResul = str_replace($caracteres,'',strtolower($sin_via[0]));

        $portExits = Harbor::where('varation->type','like','%'.$portResul.'%')
            ->get();


        if(count($portExits) > 1){
            $puerto = strtolower(trim($puerto));

            foreach($portExits as $multiples){

                $jsonorigen = json_decode($multiples['varation']);

                foreach($jsonorigen->type as $parameter){

                    if (strlen($puerto) == strlen($parameter)){
                        if(strcmp($puerto,$parameter) == 0){
                            $portVal = $multiples->id;
                            $portExiBol = true;
                            break;
                        }
                    }
                }
            }
            
            if($portExiBol == false){
                $portVal = $puerto.'_E_E';
            }

        } else{

            if(count($portExits) == 1){
                $portExiBol = true;
                foreach($portExits as $portRc){
                    $portVal = $portRc['id'];
                }
            } else{
                $portVal = $puerto.'_E_E';
            }

        }
        $data = ['puerto' => $portVal, 'boolean' => $portExiBol];
         
        return ($data);
    }
}