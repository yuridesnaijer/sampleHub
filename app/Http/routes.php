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
        $response[] = array('id' => 1, 'name' => 'goldensample.mp3', 'url' => 'https://stud.hosted.hr.nl/0883848/jaar3/samples/goldensample.mp3');
        $response[] = array('id' => 2, 'name' => 'workitoutsample.mp3', 'url' => 'https://stud.hosted.hr.nl/0883848/jaar3/samples/workitoutsample.mp3');

        return json_encode($response);
    });
});
