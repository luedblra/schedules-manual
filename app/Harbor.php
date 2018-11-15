<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Harbor extends Model
{
  protected $table    = "harbors";
  protected $fillable = ['id', 'name', 'code','display_name','coordinates','country_id','varation'];

  public function country(){
    return $this->belongsTo('App\Country');
  }

}
