<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('nearest','App\Http\Controllers\InterestPointController@nearestPoints');
Route::get('all_points','App\Http\Controllers\InterestPointController@getAllUsersPoints');
Route::post('create','App\Http\Controllers\InterestPointController@create');
Route::put('update/{point_id}','App\Http\Controllers\InterestPointController@update');
