<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Empleado extends Model
{
    
    protected $perPage = 20;

    protected $fillable = [
        'nombre',
        'apellidoP',
        'apellidoM',
        'imss',
        'registroPatronal',
        'cp',
        'nss',
        'rfc',
        'curp',
        'fechaAltaImss',
        'sdi',
        'estado',
        'creditoInfonavit',
        'fechaIngreso',
        'fechaAguinaldo',
        'estatus',
        'departamento_id',
    ];


}
