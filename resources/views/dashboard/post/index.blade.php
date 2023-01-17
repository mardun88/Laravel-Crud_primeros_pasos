@extends('dashboard.layout')

@section('content')

<a href="{{ route('post.create') }}">Crear</a><br><br>

<table >
    <thead>
        <tr>
            <th>Titulo</th>
            <th>Categoria</th>
            <th>Postedo</th>
            <th>Actiones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $p)
        <tr>
            <td>{{$p->tittle}}</td>
            
            <td>{{$p->category->tittle }}</td>
            
            <td>{{$p->posted}}</td>
            <td>
                <a href="{{ route('post.edit', $p) }}">Editar</a>
                <a href="{{ route('post.show', $p) }}">Ver</a>
                <form action="{{ route('post.destroy', $p) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{-- {{ $posts->links() }} --}}
    
@endsection