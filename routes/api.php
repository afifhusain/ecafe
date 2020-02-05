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


Route::get('cafe', 'CafeController@index');
Route::post('cafe', 'CafeController@create');
Route::get('/cafe/{id}', 'CafeController@detail');
Route::put('/cafe/{id}', 'CafeController@update');
Route::delete('/cafe/{id}', 'CafeController@delete');