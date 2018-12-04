<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProcedureSchedulesTable extends Migration
{
   /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
   {
      DB::unprepared('DROP PROCEDURE IF EXISTS procedure_schedules; CREATE  PROCEDURE procedure_schedules(IN cod int) SELECT h.name origin, h.code code_origin, ha.name destination, ha.code code_destination, c.name carrier, rt.name route_type, sh.vessel vessel, sh.voyage, sh.via via, sh.etd etd, sh.eta eta, sh.transit_time transit_time FROM `schedules` sh INNER JOIN `harbors` h ON h.id = sh.origin INNER JOIN `harbors` ha ON ha.id = sh.destination INNER JOIN `carriers` c ON c.id = sh.carrier_id INNER JOIN `routes_types` rt on rt.id = sh.route_type WHERE c.id=cod;');


   /**
     * Reverse the migrations.
     *
     * @return void
     */
   }
   public function down()
   {
     // DB::statement('DROP PROCEDURE IF EXISTS procedure_schedules');
   }
}
