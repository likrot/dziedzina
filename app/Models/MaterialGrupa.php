<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaterialGrupa extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Get the phone record associated with the user.
     */
    public function material()
    {
        return $this->hasOne('App\Models\Material');
    }
}
