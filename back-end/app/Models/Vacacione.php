<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

/**
 * Class Vacacione
 *
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Vacacione extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [];


}
