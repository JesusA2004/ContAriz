<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class CuentaBancaria extends Model
{
    
    protected $perPage = 20;

    protected $fillable = [
        'cuentaBancaria',
        'tarjeta',
        'clabeI',
        'nombreBanco',
        'empleado_id',
    ];


}
