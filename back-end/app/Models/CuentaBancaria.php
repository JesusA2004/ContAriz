<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CuentaBancaria
 *
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CuentaBancaria extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [];


}
