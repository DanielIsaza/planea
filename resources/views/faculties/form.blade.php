{!!Form::open(['url'=> $url,'method' => $method]) !!}
	<div class="form-group">
		{{ Form::label('Universidad')}}
		{!! Form::select('university_id',$universidades,$facultad->university_id,['class'=> 'form-control','placeholder'=>'Seleccione una opción','required']) !!}
	</div>
	<div class="form-group">
		{{ Form::label('Nombre')}}
		{{ Form::text('nombre',$facultad->nombre,['class' => 'form-control']) }}
	</div>
	<div class="form-group text-	">
		<a href="{{url('/facultades')}}">Regresar al listado de facultades</a>
		<input type="submit" value="Guardar" class="btn btn-success">
	</div>
{!! Form::close() !!}