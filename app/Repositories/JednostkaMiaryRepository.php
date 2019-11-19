<?php

namespace App\Repositories;

use App\Models\JednostkaMiary;

class JednostkaMiaryRepository
{
    protected $jednostkaMiary;

    public function __construct(JednostkaMiary $jednostkaMiary)
    {
        $this->jednostkaMiary = $jednostkaMiary;
    }

    public function all()
    {
        $result = $this->jednostkaMiary->all();

        return $result ? $result : null;
    }
    
    public function store($attributes)
    {
        $result = $this->jednostkaMiary->create($attributes);

        return !$result ? false : true;
    }

    public function update($attributes, $id)
    {
        $result = $this->jednostkaMiary->find($id);
        if(!$result){
            return false;
        }else{
            $result->update($attributes);
            return ['nazwa'=>$result->nazwa, 'skrot'=>$result->skrot];
        }
    }
}