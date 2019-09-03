@extends('layouts.app')
@section('content')
	<section class="container">
		<div class="row">
			<article class="col-md-10 col-md-offset-1">
				<form action="{{route('user/update',['id' => $user->id])}}" method="put" novalidate>
					@csrf
					<div class="form-group">
						<label>Nombre</label>
						<input type="text" name="name" class="form-control" required value="{{$user->name}}">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" class="form-control" required value="{{$user->email}}">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control" required value="{{$user->password}}">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success">Enviar</button>
					</div>	
				</form>
			</article>
		</div>
	</section>
@endsection