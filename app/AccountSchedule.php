<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountSchedule extends Model
{
   protected $table    = "account_schedules";
   protected $fillable = ['name','date'];


}
