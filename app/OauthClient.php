<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OauthClient extends Model
{
    protected $table    = "oauth_clients";
    protected $fillable = [
        'id',
        'name',
        'secret',
        'redirect',
        'password_client'
    ];

    protected $hidden = ['created_at','updated_at','personal_access_client','revoked'];
}
