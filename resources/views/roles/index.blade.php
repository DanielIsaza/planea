@extends("layouts.app")

@section("content")
<div class="panel panel-default">
	<div class="panel-heading">Lista de roles</div>
    <div class="panel-body">
    	@permission('roles.read')
		<table class="table table-bordered">
			<thead>
				<tr>
					<td>Nombre</td>
					<td>Descripción</td>
					<td>Acciones</td>
				</tr>
			</thead>
			<tbody>
				@foreach($roles as $rol)
					<tr>
						<td>{{ $rol->name }}</td>
						<td>{{ $rol->description }}</td>
						<td>
							<div class="row">
								<div class="col-xs-1">
							@permission('roles.update')
							<a href="{{url('/roles/'.$rol->id.'/edit')}}">
							<i class="material-icons">mode_edit</i></a>
							@endpermission
						</div>
						<div class="col-xs-6">
							@permission('roles.delete')
							@include('roles.delete',['rol'=>$rol])
							@endpermission
						</div>
					</div>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		@endpermission
	</div>
</div>
<div style="float:top; text-align:right;">
	@permission('roles.create')
	<a href="{{url('/roles/create')}}" class="btn btn-primary btn-fab">
		<i class="glyphicon glyphicon-plus"></i>
	</a>
	@endpermission
</div>
@endsection
