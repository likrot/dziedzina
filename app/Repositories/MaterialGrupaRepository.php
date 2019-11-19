<?php

namespace App\Repositories;

use App\Models\MaterialGrupa;

class MaterialGrupaRepository
{
    protected $materialGrupa;

    public function __construct(MaterialGrupa $materialGrupa)
    {
        $this->materialGrupa = $materialGrupa;
    }

    public function all()
    {
        $result = $this->materialGrupa->all();
        
        return $result ? $result : null;
    }
    
    public function store($attributes)
    {
        $result = $this->materialGrupa->create($attributes);
        
        return !$result ? false : true;
    }

    public function update($attributes, $id)
    {
        $result = $this->materialGrupa->find($id);
        if(!$result){
            return false;
        }else{
            $result->update($attributes);
            return true;
        }
    }
}