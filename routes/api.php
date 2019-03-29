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
Route::get("test", "TestController@index");
Route::post("test1", "TestController@store");

#houses
Route::get("houses", "HouseController@index");
Route::post("houses/booking/{id}", "HouseController@bookHouse");
Route::post("houses/release/{id}", "HouseController@releaseHouse");
Route::post("houses/delete/{id}", "HouseController@destroy");
Route::get("user", "UsersController@index");


// Route::get("tasks", "TaskController@index");
// Route::post("task", "TaskController@store");
Route::get("task/{id}/complete", "TaskController@complete");
Route::get("task/{id}/delete", "TaskController@destroy");

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
