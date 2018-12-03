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
      DB::unprepared("
      CREATE PROCEDURE procedure_schedules() BEGIN
      SELECT h.name origin, ha.name destination, c.name carrier, rt.name route_type, sh.vessel vessel, sh.voyage, sh.via via, sh.etd etd, sh.eta eta, sh.transit_time transit_time
      FROM schedules sh 
      INNER join harbors h on h.id = sh.origin 
      INNER join harbors ha on ha.id = sh.destination 
      INNER join carriers c on c.id = sh.carrier_id 
      INNER JOIN routes_types rt on rt.id = sh.route_type
      where c.id = '14'
      END");
   }

   /**
     * Reverse the migrations.
     *
     * @return void
     */
   public function down()
   {
      DB::statement('DROP VIEW IF EXISTS views_localcharges_ids');
   }
}
