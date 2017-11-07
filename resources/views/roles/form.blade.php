{!!Form::open(['url'=> $url,'method' => $method]) !!}
	<div class="form-group">
		<div>
			{{ Form::label('Nombre') }}
			{{ Form::text('nombre',$rol->name,['class' => 'form-control',
			'placeholder'=>'Nombre del rol']) }}
		</div>
		<div>
			{{ Form::label('Descripción') }}
			{{ Form::text('descripcion',$rol->description,['class'=> 'form-control','placeholder'=>'Descripción del rol','required']) }}
		</div>
		<div>
			{!! Field::select('permisos[]',$permisos,$permiso,['class'=>'form-control permisos','multiple'=>true]) !!}
		</div>
	</div>
	<div class="form-group text-	">
		<a href="{{url('/roles')}}">Regresar al listado de roles</a>
		<input type="submit" value="Guardar" class="btn btn-success">
	</div>
{!! Form::close() !!}
@section('tabla')
	<script type="text/javascript">
		$(".permisos").chosen({
			placeholder_text_multiple: 'Seleccione los permisos del rol',
			search_contains: true,
			no_results_text: 'No hay permisos con ese nombre'
		});
	</script>
@endsection