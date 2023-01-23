@extends('dashboard.layout')

@section('content')


    <h2> Categoria : {{$category->id}}  </h2> 
    <br><br>
    <label> Nombre</label>
    <p>{{ $category->tittle }}</p>

    <label for="">Slug</label>
    <p>{{ $category->slug }}</p>

    
@endsection