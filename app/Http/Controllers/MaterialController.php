<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\MaterialRepository;

class MaterialController extends Controller
{
    protected $materialRepository;

    public function __construct(MaterialRepository $materialRepository)
    {
        $this->materialRepository = $materialRepository;
    }

    public function show()
    {
        $result = $this->materialRepository->all();
        if(!$result){
            return response()->json(['status' => 'error', 'message' => 'Something went wrong'], 400);
        }else{
            return response()->json(['status' => 'success', 'message' => 'Material results have been fetched.', $result], 200);
        }
    }

    /**
     * Create a new material instance.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        if(!count($request->all()) > 1){
            return response()->json(['status' => 'error', 'message' => 'You are trying to add empty value!'], 400);
        }
        $result = $this->materialRepository->store($request->all());
        if(!$result){
            return response()->json(['status' => 'error', 'message' => 'Something went wrong'], 400);
        }else{
            return response()->json(['status' => 'success', 'message' => 'Material has been created', 'material' => $result], 200);
        }
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Repository\MaterialRepository  $materialId
    * @return \Illuminate\Http\Response
    */
    public function update (Request $request, $id) 
    {
        if(!count($request->all()) > 1){
            return response()->json(['status' => 'error', 'message' => 'You are trying to add empty value!'], 400);
        }
        $result = $this->materialRepository->update($request->all(), $id);
        if(!$result){
            return response()->json(['status' => 'error', 'message' => 'Something went wrong'], 400);
        }else{
            return response()->json(['status' => 'success', 'message' => 'Material has been updated', 'material' => $result], 200);
        }
    }
}