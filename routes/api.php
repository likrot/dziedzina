<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api')->put('/material-group/{id}', 'MaterialGrupaController@update');
Route::middleware('api')->post('/material-group', 'MaterialGrupaController@store');
Route::middleware('api')->get('/material-group', 'MaterialGrupaController@show');

Route::middleware('api')->put('/unit-of-measure/{id}', 'JednostkaMiaryController@update');
Route::middleware('api')->post('/unit-of-measure', 'JednostkaMiaryController@store');
Route::middleware('api')->get('/unit-of-measure', 'JednostkaMiaryController@show');

Route::middleware('api')->put('/material/{id}', 'MaterialController@update');
Route::middleware('api')->post('/material', 'MaterialController@store');
Route::middleware('api')->get('/material', 'MaterialController@show');
