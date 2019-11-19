<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\JednostkaMiaryRepository;

class JednostkaMiaryController extends Controller
{
    protected $jednostkaMiaryRepository;

    public function __construct(JednostkaMiaryRepository $jednostkaMiaryRepository)
    {
        $this->jednostkaMiaryRepository = $jednostkaMiaryRepository;
    }

    public function show()
    {
        $result = $this->jednostkaMiaryRepository->all();
        if(!$result){
            return response()->json(['status' => 'error', 'message' => 'Something went wrong'], 400);
        }else{
            return response()->json(['status' => 'success', 'message' => 'Unit of Measure has been created', $result], 200);
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
        
        $result = $this->jednostkaMiaryRepository->store(['nazwa'=>$request->name, 'skrot'=>$request->skrot]);
        if(!$result){
            return response()->json(['status' => 'error', 'message' => 'Something went wrong'], 400);
        }else{
            return response()->json(['status' => 'success', 'message' => 'Unit of Measure has been created', $request->name], 200);
        }
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Repository\JednostkaMiaryRepository  $jednostkaMiaryId
    * @return \Illuminate\Http\Response
    */
    public function update (Request $request, $id) 
    {
        if(!count($request->all()) > 1){
            return response()->json(['status' => 'error', 'message' => 'You are trying to add empty value!'], 400);
        }

        $result = $this->jednostkaMiaryRepository->update(['nazwa'=>$request->name, 'skrot' => $request->skrot], $id);
        if(!$result){
            return response()->json(['status' => 'error', 'message' => 'Something went wrong'], 400);
        }else{
            return response()->json(['status' => 'success', 'message' => 'Unit of Measure has been updated', 'unit' => $result], 200);
        }
    }
}