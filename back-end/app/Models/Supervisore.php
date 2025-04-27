<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Supervisore extends Model
{
    
    protected $perPage = 20;

    protected $fillable = [
        'nombreCompleto',
    ];

}
