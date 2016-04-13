<?php

namespace App\Http\Controllers;

use App\Models\Sample;
use Illuminate\Http\Request;

use App\Http\Requests;

use GuzzleHttp\Client;

class SampleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $samples = Sample::all();
        return view('sample.index')->with("samples", $samples);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sample.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sample = new Sample();
        $sample->name = $request->get("name");

        $link = $request->get("youtube_url");
        $video_id = explode("?v=", $link);
        $video_id = $video_id[1];

        $tmpArray = explode("&", $video_id);
        $video_id = $tmpArray[0];

        $sample->youtube_url = $video_id;
        $sample->start = $request->get("start");
        $sample->end = $request->get("end");

        $sample->save();

        return redirect()->intended("sample");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "HOI";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
