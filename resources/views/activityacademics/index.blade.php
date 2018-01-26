@extends("layouts.app")

@section("content")
	<div class="panel panel-default">
	<div class="panel-heading">Lista de actividades académicas</div>
    <div class="panel-body">
    	@permission('actividadesacademicas.read')
		<table class="table table-bordered">
			<thead>
				<tr>
					<td>Id</td>
					<td>Nombre</td>
					<td>Acciones</td>
				</tr>
			</thead>
			<tbody>
				@foreach($actividades as $actividad)
					<tr>
						<td>{{ $actividad->id }}</td>
						<td>{{ $actividad->nombre }}</td>
						<td>
							<div class="row">
								<div class="col-xs-1">
							@permission('actividadesacademicas.update')
							<a href="{{url('/actividadesacademicas/'.$actividad->id.'/edit')}}">
							<i class="material-icons">mode_edit</i></a>
							@endpermission
						</div>
						<div class="col-xs-6">
							@permission('actividadesacademicas.delete')
							@include('activityacademics.delete',['actividad'=>$actividad])
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
	@permission('actividadesacademicas.create')
	<a href="{{url('/descargalogactividades')}}" class="btn btn-success btn-fab">
		Descarga log
	</a>
	<a href="{{url('/actividadesacademicas/create')}}" class="btn btn-primary btn-fab">
		<i class="glyphicon glyphicon-plus"></i>
	</a>
	@endpermission
</div>
@endsection
