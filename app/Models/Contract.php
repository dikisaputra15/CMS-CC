<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'contract_name',
        'path',
    ];
}