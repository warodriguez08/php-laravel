@extends('layouts.app')
@section('content')
    <section class="container">
        @if(count($movies)==0)
            <p>No tienes peliculas creadas</p>
            <a href="{{ route('movie.create') }}" class="btn btn-primary">Crea tu primer pelicula</a>
        @endif

        <div class="row">
            <article class="col-md-12">
                <form action="{{ route('movie/show') }}" method="post" novalidate class="form-inline">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="nombre">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-default">Buscar</button>
                        <a href="{{ route('movie.index') }}" class="btn btn-primary">Todo</a>
                        <a href="{{ route('movie.create') }}" class="btn btn-primary">Crear</a>
                    </div>
                </form>
            </article>

            <article class="col-md-12">
                <table class="table table-condensed table.striped table-bordered">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Accion</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($movies)>0)
                        @foreach($movies as $movie)
                            <tr>
                                <td>{{ $movie->name }}</td>
                                <td>{{ $movie->description }}</td>
                                <td>
                                    <a class="btn btn-primary btn-xs"
                                       href="{{ route('movie.edit',['id' => $movie->id]) }}">Editar</a>
                                    <a class="btn btn-danger btn-xs"
                                       href="{{ route('movie/destroy',['id' => $movie->id]) }}">Eliminar</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                @endif
            </article>
        </div>
    </section>
@endsection
