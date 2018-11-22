<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RouteType extends Model
{
   protected $table    = "routes_types";
   protected $fillable = ['name'];
}
