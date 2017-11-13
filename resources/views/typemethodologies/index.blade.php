@extends("layouts.app")

@section("content")
<div class="panel panel-default">
	<div class="panel-heading">Lista de tipo de metodologías</div>
    <div class="panel-body">
    	@permission('tipometodologia.read')
		<table class="table table-bordered">
			<thead>
				<tr>
					<td>Id</td>
					<td>Nombre</td>
					<td>Acciones</td>
				</tr>
			</thead>
			<tbody>
				@foreach($tipometodologias as $tipometodologia)
					<tr>
						<td>{{ $tipometodologia->id }}</td>
						<td>{{ $tipometodologia->nombre }}</td>
						<td>
							<div class="row">
								<div class="col-xs-1">
							@permission('tipometodologia.update')
							<a href="{{url('/tiposmetodologias/'.$tipometodologia->id.'/edit')}}">
							<i class="material-icons">mode_edit</i></a>
							@endpermission
						</div>
						<div class="col-xs-6">
							@permission('tipometodologia.delete')
							@include('typemethodologies.delete',['tipometodologia'=>$tipometodologia])
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
	@permission('tipometodologia.create')
	<a href="{{url('/tiposmetodologias/create')}}" class="btn btn-primary btn-fab">
		<i class="glyphicon glyphicon-plus"></i>
	</a>
	@endpermission
</div>
@endsection
