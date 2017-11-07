@extends("layouts.app")

@section("content")
<div class="panel panel-default">
	<div class="panel-heading">Lista de usuarios</div>
    <div class="panel-body">
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
									<a href="{{url('/usuarios/'.$usuario->id.'/edit')}}">
									<i class="material-icons">mode_edit</i></a>
								</div>
								<div class="col-xs-6">
									@include('Auth.delete',['usuario'=>$usuario])
								</div>
							</div>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<div style="float:top; text-align:right;">
	<a href="{{url('/usuarios/create')}}" class="btn btn-primary btn-fab">
		<i class="glyphicon glyphicon-plus"></i>
	</a>
</div>
@endsection