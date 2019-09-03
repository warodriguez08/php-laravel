@extends('layouts.app')
@section('content')
	<section class="container">
		<div class="row">
			<article class="col-md-12">
				<form action="{{route('user/show')}}" method="post" novalidate class="form-inline">
					@csrf
					<div class="form-group">
						<label>Nombre o Email</label>
						<input type="text" name="name" class="form-control">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-default">Buscar</button>
						<a href="{{route('user.index')}}" class="btn btn-primary">Todo</a>
						<a href="{{route('user.create')}}" class="btn btn-primary">Crear</a>
					</div>
				</form>
			</article>
			<article class="col-md-12">
				<table class="table table-condensed table-striped table-bordered">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Email</th>
							<th>Rol</th>
							<th>Acción</th>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $user)
						<tr>
							<td>{{$user->name}}</td>
							<td>{{$user->email}}</td>
							<td>{{$user->role}}</td>
							<td>
								<a class="btn btn-primary btn-xs" href="{{route('user.edit',['id'=>$user->id])}}">Editar</a>
								<a class="btn btn-danger btn-xs" href="{{route('user/destroy',['id'=>$user->id])}}">Eliminar</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</article>
		</div>
	</section>
@endsection
