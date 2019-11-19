<?php

namespace App\Repositories;

use App\Models\Material;

class MaterialRepository
{
    protected $material;

    public function __construct(Material $material)
    {
        $this->material = $material;
    }

    public function all()
    {
        $result = $this->material->all();
        if($result){
            return $result;
        }else{
            return null;
        }
    }
    
    public function store($attributes)
    {
        $query = [];
        if($attributes){
            $query = [
                'kod' => $attributes['code'],
                'nazwa' => $attributes['name'],
                'material_group_id' => $attributes['group'],
                'unit_of_measure_id' => $attributes['unit']
            ];
        }
        //@ToDo move to custom middleware validator
        $group = $this->material->where('material_group_id', $attributes['group'])->exists() ? true : false;
        $unit = $this->material->where('unit_of_measure_id', $attributes['unit'])->exists() ? true : false;
        if(!$group || !$unit) return false;
        $result = $this->material->create($query);

        return !$result ? false : $result;
    }

    public function update($attributes, $id)
    {
        $result = $this->material->find($id);
        if(!$result){
            return false;
        }else{
            $query = [];
            if($attributes){
                $query = [
                    'kod' => $attributes['code'],
                    'nazwa' => $attributes['name'],
                    'material_group_id' => $attributes['group'],
                    'unit_of_measure_id' => $attributes['unit']
                ];
            }
            //@ToDo move to custom middleware validator
            $group = $this->material->where('material_group_id', $attributes['group'])->exists() ? true : false;
            $unit = $this->material->where('unit_of_measure_id', $attributes['unit'])->exists() ? true : false;
            if(!$group || !$unit) return false;
            $r = $result->update($query);
            if(!$r){
                return false;
            }else{
                return [
                    'code' => $result->kod,
                    'name' => $result->nazwa,
                    'group' => $result->material_group_id,
                    'unit' => $result->unit_of_measure_id
                ];
            }
        }
    }
}