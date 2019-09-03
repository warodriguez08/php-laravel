@extends('layouts.app')
@section('content')
	<section class="container">
		<div class="row">
			<article class="col-md-10 col-md-offset-1">
				<form action="{{route('status.store')}}" method="post" novalidate>
					@csrf
					<div class="form-group">
						<label>Status</label>
						<input type="text" name="status" class="form-control" required>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success">Enviar</button>
					</div>
				</form>
			</article>
		</div>
	</section>
@endsection