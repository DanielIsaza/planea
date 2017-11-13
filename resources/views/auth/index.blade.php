@extends("layouts.app")

@section("content")
<div class="panel panel-default">
	<div class="panel-heading">Lista de usuarios</div>
    <div class="panel-body">
    	@permission('usuario.read')
		<table class="table table-bordered">
			<thead>
				<tr>
					<td>Nombre</td>
					<td>Correo</td>
					<td>Rol</td>
					<td>Acciones</td>
				</tr>
			</thead>
			<tbody>
				@foreach($usuarios as $usuario)
					<tr>
						<td>{{ $usuario->name }}</td>
						<td>{{ $usuario->email }}</td>
						<td>{{ $usuario->roles[0]->name }}</td>
						<td>
							<div class="row">
								<div class="col-xs-1">
									@permission('usuario.update')
									<a href="{{url('/usuarios/'.$usuario->id.'/edit')}}">
									<i class="material-icons">mode_edit</i></a>
									@endpermission
								</div>
								<div class="col-xs-6">
									@permission('usuario.delete')
									@include('Auth.delete',['usuario'=>$usuario])
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
	@permission('usuario.create')
	<a href="{{url('/usuarios/create')}}" class="btn btn-primary btn-fab">
		<i class="glyphicon glyphicon-plus"></i>
	</a>
	@endpermission
</div>
@endsection