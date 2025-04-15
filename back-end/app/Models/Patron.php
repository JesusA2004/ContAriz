<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Patron
 *
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Patron extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [];


}
