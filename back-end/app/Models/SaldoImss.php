<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class SaldoImss extends Model
{
    
    protected $perPage = 20;

    protected $fillable = [
        'descripcion',
        'saldo',
        'fecha',
        'empleado_id',
    ];

}
