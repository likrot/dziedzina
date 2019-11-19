<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JednostkaMiary extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nazwa', 'skrot'];
}
