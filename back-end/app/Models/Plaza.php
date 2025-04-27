<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Plaza extends Model
{
    
    protected $perPage = 20;

    protected $fillable = [
        'nombre',
        'patron_id',
    ];

}
