@extends("layouts.app")

@section("content")
<div class="panel panel-default">
	<div class="panel-heading">Lista de tipos de habilidad</div>
    <div class="panel-body">
       	@permission('tipohabilidad.read')
		<table class="table table-bordered">
			<thead>
				<tr>
					<td>Id</td>
					<td>Nombre</td>
					<td>Acciones</td>
				</tr>
			</thead>
			<tbody>
				@foreach($tiposHabilidades as $tipoHabilidad)
					<tr>
						<td>{{ $tipoHabilidad->id }}</td>
						<td>{{ $tipoHabilidad->nombre }}</td>
						<td>
							<div class="row">
								<div class="col-xs-1">
							@permission('tipohabilidad.update')
							<a href="{{url('/tiposhabilidad/'.$tipoHabilidad->id.'/edit')}}">
							<i class="material-icons">mode_edit</i></a>
							@endpermission
							</div>
							<div class="col-xs-6">
								@permission('tipohabilidad.delete')
								@include('typeabilities.delete',['tipoHabilidad'=>$tipoHabilidad])
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
	@permission('tipohabilidad.create')
	<a href="{{url('/tiposhabilidad/create')}}" class="btn btn-primary btn-fab">
		<i class="glyphicon glyphicon-plus"></i>
	</a>
	@endpermission
</div>
@endsection
