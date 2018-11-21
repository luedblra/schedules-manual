<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileTmp extends Model
{
   protected $table    = "files_tmps";
   protected $fillable = [
      'id',
      'namefile',
      'account_schedules_id'
   ];
}
