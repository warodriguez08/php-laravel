@extends('layouts.app')
@section('content')
	<section class="container">
		<div class="row">
			<article class="col-md-10 col-md-offset-1">
				<form action="{{route('movie/update',['id' => $movie->id])}}" method="put" novalidate>
					@csrf
					<div class="form-group">
						<label>Nombre</label>
						<input type="text" name="name" class="form-control" required value="{{$movie->name}}">
					</div>
					<div class="form-group">
						<label>Descripción</label>
						<input type="text" name="description" class="form-control" required value="{{$movie->description}}">
					</div>
                    <div class="form-group">
                        <label>Estado</label>
                        <select class="form-control" name="status_id">
                            <option value="{{$movie->status->id}}">
                                {{$movie->status->status}}
                            </option>
                            @foreach($statuses as $status)
                                <option value="{{$status->id}}">
                                    {{$status->status}}
                                </option>
                            @endforeach
                        </select>
                    </div>
					<div class="form-group">
						<button class="btn btn-success">Enviar</button>
					</div>
				</form>
			</article>
		</div>
	</section>
@endsection
