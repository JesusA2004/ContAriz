<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class EmpresaFacturacion extends Model
{
    
    protected $perPage = 20;

    protected $fillable = [
        'nombre',
        'plaza',
    ];

}
