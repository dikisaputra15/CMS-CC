<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id_docc',
        'contract_filename',
        'path_contract',
    ];
}
