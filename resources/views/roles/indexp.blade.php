@extends("layouts.app")

@section("content")
<div class="panel panel-default">
	<div class="panel-heading">Lista de permisos</div>
    <div class="panel-body">
		<table class="table table-bordered">
			<thead>
				<tr>
					<td>Nombre</td>
					<td>Descripción</td>
				</tr>
			</thead>
			<tbody>
				@foreach($permisos as $permiso)
				<tr>
					<td>{{ $permiso->name }}</td>
					<td>{{ $permiso->description }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection