<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSchedulesTable extends Migration
{
   /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
   {
      Schema::create('schedules', function (Blueprint $table) {
         $table->increments('id');
         $table->integer('origin')->unsigned();
         $table->integer('destination')->unsigned();
         $table->string('carrier');
         $table->string('vessel');
         $table->string('voyage')->nullable();
         $table->string('route_type');
         $table->string('via')->nullable();
         $table->date('etd');
         $table->date('eta');
         $table->string('transit_time');
         $table->integer('account_schedules_id')->unsigned();
         $table->foreign('account_schedules_id')->references('id')->on('account_schedules')->onDelete('cascade');
         $table->foreign('origin')->references('id')->on('harbors')->onDelete('cascade');
         $table->foreign('destination')->references('id')->on('harbors')->onDelete('cascade');
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
      Schema::dropIfExists('schedules');
   }
}
