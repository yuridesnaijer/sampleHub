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

use App\Models\Project;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;

Route::get('/', function () {
    return redirect()->route('sample.index');
//    return view('home');
});

Route::resource('sample', 'SampleController');

Route::group(['prefix' => 'api/v1/'], function () {

    Route::get('addSample', function(\Illuminate\Http\Request $request) {
        $sampleController = new \App\Http\Controllers\SampleController();
        $sampleController->store($request);
    });

    Route::get('sampleTest', function ()
    {
        $project = Project::find(1);
        $samples = $project->samples()->where("pulled", "=", 0)->get();

        $response = [];
        foreach($samples as $sample){
            $url = 'www.youtubeinmp3.com/fetch/?video=http://www.youtube.com/watch?v='.$sample->youtube_url."&start=".$sample->start."&end=".$sample->end;

            $client = new GuzzleHttp\Client();

            $newFile = public_path()."\\samples\\".$sample->name;

            $resource = fopen($newFile, 'w');
            $stream = GuzzleHttp\Psr7\stream_for($resource);
            $client->request('GET', $gurl, ['save_to' => $stream]);
            fclose($resource);

            //ensure file doesn't contain html (BUG)
            $contentNewFile = file_get_contents($newFile);

            if(preg_match("<html>",$contentNewFile,$m) != 0){
                unlink($newFile);

                $resource = fopen($newFile, 'w');
                $stream = GuzzleHttp\Psr7\stream_for($resource);
                $client->request('GET', $url, ['save_to' => $stream]);
                fclose($resource);

                $contentNewFile = file_get_contents($newFile);

                if(preg_match("<html>",$contentNewFile,$m) != 0){
                    unlink($newFile);

                    $resource = fopen($newFile, 'w');
                    $stream = GuzzleHttp\Psr7\stream_for($resource);
                    $client->request('GET', $url, ['save_to' => $stream]);
                    fclose($resource);

                    $contentNewFile = file_get_contents($newFile);

                    if(preg_match("<html>",$contentNewFile,$m) != 0){
                        unlink($newFile);

                        $resource = fopen($newFile, 'w');
                        $stream = GuzzleHttp\Psr7\stream_for($resource);
                        $client->request('GET', $url, ['save_to' => $stream]);
                        fclose($resource);
                        unlink($newFile);
                    }
                }
            }

            $sample->url = URL::to('/')."/samples/".$sample->name;
            $response[] = $sample;

            $tmp_sample = \App\Models\Sample::find($sample->id);
            $tmp_sample->pulled = 1;
            $tmp_sample->save();
        }

        return json_encode($response);
    });
});
