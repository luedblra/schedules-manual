<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCredentialsApiTable extends Migration
{
   /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
   {
      Schema::create('credentials_api', function (Blueprint $table) {
         $table->increments('id');
         $table->string('auth_post');
         $table->string('client_id');
         $table->string('client_secret');
         $table->string('user_name');
         $table->string('password');
         $table->string('url');
         $table->integer('carrier_id')->unsigned();
         $table->foreign('carrier_id')->references('id')->on('carriers');
         $table->string('description')->nullable();
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
      Schema::dropIfExists('credentials_api');
   }
}
