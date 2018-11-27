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

   public function carrier(){
      return $this->belongsTo('App\Carrier','carrier_id');
   }
   
   public function origen(){
      return $this->belongsTo('App\Harbor','origin');
   }
   
   public function destiny(){
      return $this->belongsTo('App\Harbor','destination');
   }
    public function routetype(){
      return $this->belongsTo('App\RouteType','route_type');
   }
}
