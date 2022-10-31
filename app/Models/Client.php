<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'service_id',
        'nama_client',
        'address',
        'start_date',
        'end_date',
        'client_since',
        'client_poc',
        'concord_poc',
        'end_user_poc',
        'no_of_subs',
        'list_of_subs',
        'duration',
    ];
}
