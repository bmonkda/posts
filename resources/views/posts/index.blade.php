@extends('plantillas.plantilla')

@section('title', 'LISTA')

@section('content')

<div class="container">
    
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Contenido</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)

                <tr>
                    <td scope="row">{{ $post->id }}</td>
                    <td>{{ $post->titulo }}</td>
                    <td>{{ $post->contenido }}</td>
                    <td>
                        <a href="">Ver</a>
                        <a href="">Editar</a>
                        <a href="">Eliminar</a>
                    </td>
                </tr>
            
            @endforeach
           
        </tbody>
    </table>
    
</div>

@endsection

@section('scripts')
    <script>
        // Aquí van los scripts específicos de esta vista
    </script>
@endsection