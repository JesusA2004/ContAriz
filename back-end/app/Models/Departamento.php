<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Departamento extends Model
{
    
    protected $perPage = 20;

    protected $fillable = [
        'nombre',
        'empresa_facturacion_id',
    ];

}
