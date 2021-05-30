<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/classes','Api\ClassController');

// Route::apiResource('/classes/update/{id}','Api\ClassController@update');
