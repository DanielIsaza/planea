@extends('layouts.app')

@section("content")
	<div class="panel panel-default">
		<div class="panel-heading">Lista de universidades</div>
        <div class="panel-body">
        	@permission('universidades.read')
			<table class="table table-bordered">
				<thead>
					<tr>
						<td>Id</td>
						<td>Nombre</td>
						<td>Acciones</td>
					</tr>
				</thead>
				<tbody>
					@foreach($universidades as $universidad)
						<tr>
							<td>{{ $universidad->id }}</td>
							<td>{{ $universidad->nombre }}</td>
							<td>
								<div class="row">
									@permission('universidades.update') 
									<div class="col-xs-1">
										<a href="{{url('/universidades/'.$universidad->id.'/edit')}}">
											<i class="material-icons">mode_edit</i></a>
									</div>
									@endpermission
									@permission('universidades.delete') 
									<div class="col-xs-6">
											@include('universities.delete',['universidad'=>$universidad])
									</div>
									@endpermission
								</div>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			@endpermission
		</div>
	</div>
	@permission('universidades.create') 
	<div style="float:top; text-align:right;">
			<a href="{{url('/importarUniversidades')}}" class="btn btn-success btn-fab">
				Cargar desde archivo
			</a>
			<a href="{{url('/universidades/create')}}" class="btn btn-primary btn-fab">
				<i class="glyphicon glyphicon-plus"></i>
			</a>
	</div>
	@endpermission
@endsection
