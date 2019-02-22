<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProcedureSchedulesListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS procedure_schedules_list; CREATE PROCEDURE procedure_schedules_list() SELECT sh.id, hrO.name AS origin, hrD.name AS destination, cr.name AS carrier_id, sh.vessel, sh.voyage, rt.name AS route_type, sh.via, sh.etd, sh.eta, sh.transit_time, sh.account_schedules_id FROM schedules sh INNER JOIN harbors hrO ON sh.origin = hrO.id INNER JOIN harbors hrD ON sh.destination=hrD.id INNER JOIN carriers cr ON sh.carrier_id=cr.id INNER JOIN routes_types rt ON sh.route_type=rt.id;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
