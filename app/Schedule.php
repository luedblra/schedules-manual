<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
   protected $table    = "schedules";
   protected $fillable = [
      'origin',
      'destination',
      'carrier_id',
      'vessel',
      'voyage',
      'route_type',
      'via',
      'etd',
      'eta',
      'transit_time',
      'account_schedules_id'
   ];
}