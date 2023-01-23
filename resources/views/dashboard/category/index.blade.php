@extends('dashboard.layout')

@section('content')

<h1>Pagina de las Categorias</h1>


<a href="{{ route("category.create") }}">Crear Categoria</a>
<br>
<br>

<table>

    <thead>
        <tr>
            <td>TITUTLO</td>
            <td>SLUG</td>
            <td>ACCIONES</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($category as $c)
        <tr>
            <td>{{$c->tittle}}</td>
            <td>{{$c->slug}}</td>
            <td>
                <a href="{{ route('category.edit', $c) }}">Editar</a>
                <a href="{{ route('category.show', $c) }}">Ver</a>

                <form action="{{ route("category.destroy", $c) }} " method="POST">
                    @method("DELETE")
                    @csrf
                    <button type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

    
@endsection
