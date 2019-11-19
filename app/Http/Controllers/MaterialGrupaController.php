<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\MaterialGrupaRepository;

class MaterialGrupaController extends Controller
{
    protected $materialGrupaRepository;

    public function __construct(MaterialGrupaRepository $materialGrupaRepository)
    {
        $this->materialGrupaRepository = $materialGrupaRepository;
    }
    
    public function show()
    {
        $result = $this->materialGrupaRepository->all();
        if(!$result){
            return response()->json(['status' => 'error', 'message' => 'Something went wrong'], 400);
        }else{
            return response()->json(['status' => 'success', 'message' => 'Material Group results have been fetched.', $result], 200);
        }
    }
    /**
     * Create a new materialGroup instance.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        if(!count($request->all()) > 1){
            return response()->json(['status' => 'error', 'message' => 'You are trying to add empty value!'], 400);
        }
        $result = $this->materialGrupaRepository->store(['name'=>$request->name]);
        if(!$result){
            return response()->json(['status' => 'error', 'message' => 'Something went wrong'], 400);
        }else{
            return response()->json(['status' => 'success', 'message' => 'Material Group has been created', $request->name], 200);
        }
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Repository\MaterialGrupaRepository  $materialGroupId
    * @return \Illuminate\Http\Response
    */
    public function update (Request $request, $id) 
    {
        if(!count($request->all()) > 1){
            return response()->json(['status' => 'error', 'message' => 'You are trying to add empty value!'], 400);
        }
        $result = $this->materialGrupaRepository->update(['name'=>$request->name], $id);
        if(!$result){
            return response()->json(['status' => 'error', 'message' => 'Something went wrong'], 400);
        }else{
            return response()->json(['status' => 'success', 'message' => 'Material Group has been updated', $request->name], 200);
        }
    }
}