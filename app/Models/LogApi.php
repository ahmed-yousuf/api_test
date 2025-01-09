<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogApi extends Model
{
    protected $table = 'log_api';
    protected $fillable = [
        'vin',
        'ip_address',
        'user_agent',
        'status_code',
        'response_time_ms',
    ];
}
