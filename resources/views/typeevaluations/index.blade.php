@extends("layouts.app")

@section("content")
<div class="panel panel-default">
	<div class="panel-heading">Lista de tipos de evaluación</div>
    <div class="panel-body">
    	@permission('tipoevaluacion.read')
		<table class="table table-bordered">
			<thead>
				<tr>
					<td>Id</td>
					<td>Nombre</td>
					<td>Acciones</td>
				</tr>
			</thead>
			<tbody>
				@foreach($tipoevaluaciones as $tipoevaluacion)
					<tr>
						<td>{{ $tipoevaluacion->id }}</td>
						<td>{{ $tipoevaluacion->nombre }}</td>
						<td>
							<div class="row">
								<div class="col-xs-1">
							@permission('tipoevaluacion.update')
							<a href="{{url('/tiposevaluaciones/'.$tipoevaluacion->id.'/edit')}}">
							<i class="material-icons">mode_edit</i></a>
							@endpermission
						</div>
						<div class="col-xs-6">
							@permission('tipoevaluacion.delete')
							@include('typeevaluations.delete',['tipoevaluacion'=>$tipoevaluacion])
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
	@permission('tipoevaluacion.create')
	<a href="{{url('/tiposevaluaciones/create')}}" class="btn btn-primary btn-fab">
		<i class="glyphicon glyphicon-plus"></i>
	</a>
	@endpermission
</div>
@endsection
