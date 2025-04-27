<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class EmpresaFacturacion extends Model
{
    
    protected $collection = 'empresas_facturacion';

    protected $perPage = 20;

    protected $fillable = [
        'nombre',
        'plaza_id',
    ];

    protected $primaryKey = '_id'; // <- Agregado aquí

}
