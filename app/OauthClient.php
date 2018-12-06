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
        'personal_access_client',
        'password_client'
    ];

    protected $hidden = ['created_at','updated_at','revoked'];
}
