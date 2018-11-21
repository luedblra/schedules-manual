<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFilesTmpsTable extends Migration
{
   /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
   {
      Schema::create('files_tmps', function (Blueprint $table) {
         $table->increments('id');
         $table->string('namefile');
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
      Schema::dropIfExists('files_tmps');
   }
}
