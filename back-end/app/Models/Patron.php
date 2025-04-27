<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Patron extends Model
{
    
    protected $perPage = 20;

    protected $fillable = [
        'nombre',
    ];


}
