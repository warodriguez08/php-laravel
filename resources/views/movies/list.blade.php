@extends('layouts.app')
@section('content')
	<section class="container">
		<div class="row">
			<article class="col-md-12">
				<form action="{{route('movie/show')}}" method="post" novalidate class="form-inline">
					@csrf
					<div class="form-group">
						<label>Nombre</label>
						<input type="text" name="name" class="form-control">
					</div>
					<div>
						<button class="btn btn-default">Buscar</button>
						<a href="{{route('movie.index')}}" class="btn btn-primary">Todo</a>

                        @if(Auth::user()->role == 'Admin')
                            <a href="{{route('movie.create')}}" class="btn btn-primary">Crear</a>
                        @endif
					</div>
				</form>
			</article>
			<article class="col-md-12">
				<table class="table table-condensed table-striped table-bordered">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Descripción</th>
                            <th>Registrado por</th>
                            <th>Categorias</th>
                            <th>Estado</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach($movies as $movie)
						<tr>
							<td>{{$movie->name}}</td>
							<td>{{$movie->description}}</td>
                            <td>{{$movie->user->name}}</td>
                            <td>{{$movie->status->status}}</td>
                            <td>
                                @foreach($movie->categories as $category)
                                    <span>
                                        {{$category->name}}
                                    </span>
                                @endforeach
                            </td>
							<td>
								<a class="btn btn-primary btn-xs" href="{{route('movie.edit',['id'=>$movie->id])}}">Editar</a>
								<a class="btn btn-danger btn-xs" href="{{route('movie/destroy',['id'=>$movie->id])}}">Eliminar</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</article>
		</div>
	</section>
@endsection
