@extends('global.main')
@section('content')

    <form action="{{url("sample")}}" method="post">
        <div>
            <label for="name">name</label>
            <input id="name" name="name" type="text">
        </div>
        <div>
            <label for="youtube_url">youtube</label>
            <input id="youtube_url" name="youtube_url" type="text">
        </div>
        <div>
            <label for="start">start</label>
            <input id="start" name="start" type="number">
        </div>
        <div>
            <label for="end">end</label>
            <input id="end" name="end" type="number">
        </div>

        {!! Form::token() !!}

        <input type="submit" value="ADD">
    </form>

@endsection