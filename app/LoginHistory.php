<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginHistory extends Model
{
    protected $table = 'login_history';

    protected $fillable = [
        'user_id', 'location', 'ip_address', 'browser', 'operating_system', 'device',
    ];
}
