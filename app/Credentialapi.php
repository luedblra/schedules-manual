<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credentialapi extends Model
{
   protected $table = 'credentials_api';
   protected $fillable = [
      'auth_post',
      'client_id',
      'client_secret',
      'user_name',
      'password',
      'url',
      'carrier_id',
      'description'
   ];

   public function carrier(){
      return $this->belongsTo('App\Carrier','carrier_id');
   }
}
