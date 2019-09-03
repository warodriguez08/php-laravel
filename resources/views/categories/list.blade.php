@extends('layouts.app')
@section('content')
	<section class="container">
		<div class="row">
			<article class="col-md-12">
				<form action="{{route('category/show')}}" method="post" novalidate class="form-inline">
					@csrf
					<div class="form-group">
						<label>Nombre</label>
						<input type="text" name="name" class="form-control">
					</div>
					<div>
						<button type="submit" class="btn btn-default">Buscar</button>
						<a href="{{route('category.index')}}" class="btn btn-primary">Todo</a>
						<a href="{{route('category.create')}}" class="btn btn-primary">Crear</a>
					</div>
				</form>
			</article>
			<article class="col-md-12">
				<table class="table table-condensed table-striped table-bordered">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Acción</th>
						</tr>
					</thead>
					<tbody>
						@foreach($categories as $category)
						<tr>
							<td>{{$category->name}}</td>
							<td>
								<a class="btn btn-primary btn-xs" href="{{route('category.edit',['id'=>$category->id])}}">Editar</a>
								<a class="btn btn-danger btn-xs" href="{{route('category/destroy',['id'=>$category->id])}}">Eliminar</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</article>
		</div>
	</section>
@endsection