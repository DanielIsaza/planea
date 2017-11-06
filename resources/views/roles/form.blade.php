{!!Form::open(['url'=> $url,'method' => $method]) !!}
	<div class="form-group">
		<div>
			{{ Form::label('Nombre') }}
			{{ Form::text('nombre',$rol->name,['class' => 'form-control',
			'placeholder'=>'Nombre del rol']) }}
		</div>
		<div>
			{{ Form::label('Descripción') }}
			{{ Form::text('descripcion',$rol->description,['class'=> 'form-control','placeholder'=>'Descripción del rol']) }}
		</div>
	</div>
	<div>
		{{ Form::label('Roles disponibles')}}
		<table class="table table-bordered">
			<thead>
				<tr>
					<td>Nombre</td>
					<td>Descripción</td>
					<td>Seleccionar</td>
				</tr>
			</thead>
			<tbody>
				@foreach($permisos as $permiso)
				<tr>
					<td>{{ $permiso->name }}</td>
					<td>{{ $permiso->description }}</td>
					<td><input type="checkbox" aria-label="..."></td>
				</tr>
				@endforeach
			</tbody>
		</table>
				{{ $permisos->links() }}
	</div>
	<div class="form-group text-	">
		<a href="{{url('/roles')}}">Regresar al listado de roles</a>
		<input type="submit" value="Guardar" class="btn btn-success">
	</div>
{!! Form::close() !!}