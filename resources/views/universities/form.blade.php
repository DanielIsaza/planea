{!!Form::open(['url'=> $url,'method' => $method]) !!}
	<div class="form-group">
		{{ Form::label('Nombre')}}
		{{ Form::text('nombre',$universidad->nombre,['class' => 'form-control']) }}
	</div>
	<div class="float:top; text-align:right;">
		<a href="{{url('/universidades')}}">Regresar al listado de Universidades</a>
		<input type="submit" value="Guardar" class="btn btn-success">
	</div>
{!! Form::close() !!}
