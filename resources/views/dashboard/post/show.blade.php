@extends('dashboard.layout')

@section('content')
    <h1>Post : </h1><br><br>

    <p>{{$post->tittle}}</p>

    <p>{{$post->posted}}</p>

    <p>{{$post->description}}</p>

    <div>{{$post->content}}</div>

@endsection