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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/usertype', 'UsertypeController@index');
Route::post('/usertcreate', 'UsertypeController@store');

Route::post('/userscreate', 'UsersController@store');

Route::delete('/users/{id}', 'UsersController@destroy');
Route::delete('/offices/{id}', 'OfficeController@destroy');


