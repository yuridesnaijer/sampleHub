@extends('global.main')
@section('content')

    <a href="{{url('sample/create')}}">ADD</a>

    <ul>
        <?php foreach($samples as $sample): ?>
            <li><a href="{{url('sample/'.$sample->id)}}" >{{$sample->name}}</a></li>
        <?php endforeach; ?>
    </ul>

@endsection