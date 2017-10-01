{!!Form::open(['url'=> $url,'method' => $method]) !!}
	<div class="form-group">
		{{ Form::label('Nombre')}}
		{{ Form::text('nombre',$estado->nombre,['class' => 'form-control',
		'placeholder'=>'Nombre del nuevo estado']) }}
	</div>
	<div class="form-group text-	">
		<a href="{{url('/estados')}}">Regresar al listado de Estados</a>
		<input type="submit" value="Guardar" class="btn btn-success">
	</div>
{!! Form::close() !!}