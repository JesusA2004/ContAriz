<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class User extends Model
{
    
    protected $perPage = 20;

    protected $fillable = [
        'name',
        'email',
        'password',
        'rol',
    ];

}
