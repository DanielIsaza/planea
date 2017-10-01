{!!Form::open(['url'=> $url,'method' => $method]) !!}
	<div class="form-group">
		{{ Form::label('Nombre') }}
		{{ Form::text('nombre',$area->nombre,['class' => 'form-control',
		'placeholder'=>'Nombre del área de conocimiento']) }}
	</div>
	<div class="form-group text-	">
		<a href="{{url('/areasconocimiento')}}">Regresar al listado de áreas</a>
		<input type="submit" value="Guardar" class="btn btn-success">
	</div>
{!! Form::close() !!}