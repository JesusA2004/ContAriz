<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class HistorialQuincena extends Model
{
    
    protected $perPage = 20;

    protected $fillable = [
        'quincena',
        'fecha',
        'empleado_id',
    ];

}
