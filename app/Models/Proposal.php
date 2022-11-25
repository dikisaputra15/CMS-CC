<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'contract_no',
        'client_name',
        'type_of_service',
        'path',
    ];
}
