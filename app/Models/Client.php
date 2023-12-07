<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'nama_client',
        'address',
        'client_since',
        'client_poc',
        'concord_poc',
        'end_user_poc',
        'no_of_subs',
        'list_of_subs',
    ];
}
