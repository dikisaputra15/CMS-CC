<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_propective_client extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'id_pros_client',
        'date',
        'remarks',
        'client_poc',
    ];
}
