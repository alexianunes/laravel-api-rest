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

Route::post('login', 'API\UserController@login')->name('auth.login');

Route::group(['middleware' => 'auth:api'], function(){
    Route::post('details', 'API\UserController@details');


    Route::apiResource('medicos', 'API\MedicoController');
    Route::get('medicos/search', 'API\MedicoController@search')->name('medicos.search');
    

});
