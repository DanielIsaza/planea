{!!Form::open(['url'=> $url,'method' => $method]) !!}
	<div class="form-group">
		{{ Form::label('Nombre') }}
		{{ Form::text('nombre',$actividad->nombre,['class' => 'form-control']) }}
	</div>
	<div class="form-group text-	">
		<a href="{{url('/actividadesacademicas')}}">Regresar al listado de actividades académicas</a>
		<input type="submit" value="Guardar" class="btn btn-success">
	</div>
{!! Form::close() !!}