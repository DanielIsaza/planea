{!!Form::open(['url'=> $url,'method' => $method]) !!}
	<div class="form-group">
		{{ Form::label('Nombre')}}
		{{ Form::text('nombre',$tipometodologia->nombre,['class' => 'form-control']) }}
	</div>
	<div class="form-group text-	">
		<a href="{{url('/tiposmetodologias')}}">Regresar al listado de tipos de metodologías</a>
		<input type="submit" value="Guardar" class="btn btn-success">
	</div>
{!! Form::close() !!}