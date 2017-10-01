{!!Form::open(['url'=> $url,'method' => $method]) !!}
	<div class="form-group">
		{{ Form::label('Nombre') }}
		{{ Form::text('nombre',$rol->nombre,['class' => 'form-control',
		'placeholder'=>'Nombre del rol']) }}
	</div>
	<div class="form-group text-	">
		<a href="{{url('/roles')}}">Regresar al listado de roles</a>
		<input type="submit" value="Guardar" class="btn btn-success">
	</div>
{!! Form::close() !!}