<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProcedureSchedulesAllTable extends Migration
{
   /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
   {


      DB::unprepared('DROP PROCEDURE IF EXISTS procedure_schedules_all; CREATE PROCEDURE procedure_schedules_all(IN orig int,dest int, car int ) SELECT h.name origin, h.code code_origin, ha.name destination, ha.code code_destination, c.name carrier, rt.name route_type, sh.vessel vessel, sh.voyage, sh.via via, sh.etd etd, sh.eta eta, sh.transit_time transit_time FROM `schedules` sh INNER JOIN `harbors` h ON h.id = sh.origin INNER JOIN `harbors` ha ON ha.id = sh.destination INNER JOIN `carriers` c ON c.id = sh.carrier_id INNER JOIN `routes_types` rt on rt.id = sh.route_type WHERE c.id=car AND sh.origin = orig AND sh.destination=dest;');

   }

   /**
     * Reverse the migrations.
     *
     * @return void
     */
   public function down()
   {
      // Schema::dropIfExists('procedure_schedules_all');
   }
}
