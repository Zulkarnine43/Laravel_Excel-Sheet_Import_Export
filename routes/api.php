<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/classes','Api\ClassController');

Route::get('/person','MyController@indexx');
Route::post('/insertp','MyController@store');

// Route::apiResource('/classes/update/{id}','Api\ClassController@update');

Route::group([

    'prefix' => 'auth'

], function () {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});