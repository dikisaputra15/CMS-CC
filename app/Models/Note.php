<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_dclient';

    public $timestamps = false;

    protected $fillable = [
        'id_dclient',
        'notes',
    ];
}
