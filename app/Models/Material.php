<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['kod', 'nazwa', 'material_group_id', 'unit_of_measure_id'];
    /**
     * Get the user that owns the phone.
     */
    public function materialGroup()
    {
        return $this->belongsTo('App\Models\MaterialGrupa');
    }
}
