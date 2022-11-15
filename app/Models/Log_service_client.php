<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log_service_client extends Model
{
    use HasFactory;

    // protected $primaryKey = 'id_client';

    public $timestamps = false;

    protected $fillable = [
        'id_client',
        'id_service',
        'date',
        'remarks',
    ];
}
