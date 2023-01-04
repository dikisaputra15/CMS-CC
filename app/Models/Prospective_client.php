<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prospective_client extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'nama_client',
        'poc_cc',
    ];
}
