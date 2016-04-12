<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home');
});

Route::group(['prefix' => 'api/v1/'], function () {
    Route::get('sampleTest', function ()
    {
        $response = [];
        $arr = array('id' => 1, 'name' => 'newnewnew.wav', 'url' => 'https://stud.hosted.hr.nl/0882153/jaar3/samples/SNARE3.WAV');

        $response[] = $arr;

        return json_encode($response);
    });
});
