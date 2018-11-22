<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFailedSchedulesTable extends Migration
{
   /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
   {
      Schema::create('failed_schedules', function (Blueprint $table) {
         $table->increments('id');
         $table->string('origin');
         $table->string('destination');
         $table->string('carrier');
         $table->string('vessel');
         $table->string('voyage')->nullable();
         $table->string('route_type');
         $table->string('via')->nullable();
         $table->string('etd');
         $table->string('eta');
         $table->string('transit_time');
         $table->integer('account_schedules_id')->unsigned();
         $table->foreign('account_schedules_id')->references('id')->on('account_schedules')->onDelete('cascade');
         $table->timestamps();
      });
   }

   /**
     * Reverse the migrations.
     *
     * @return void
     */
   public function down()
   {
      Schema::dropIfExists('failed_schedules');
   }
}
