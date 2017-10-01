{!!Form::open(['url'=> $url,'method' => $method]) !!}
	<div class="form-group">
		{{ Form::label('Nombre')}}
		{{ Form::text('nombre',$tipoevaluacion->nombre,['class' => 'form-control',
		'placeholder'=>'Nombre del tipo de evaluación']) }}
	</div>
	<div class="form-group text-	">
		<a href="{{url('/tiposevaluaciones')}}">Regresar al listado de tipos de evaluación</a>
		<input type="submit" value="Guardar" class="btn btn-success">
	</div>
{!! Form::close() !!}