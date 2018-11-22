<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FailedSchedule extends Model
{
   protected $table    = "failed_schedules";
   protected $fillable = [
      'origin',
      'destination',
      'carrier',
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
