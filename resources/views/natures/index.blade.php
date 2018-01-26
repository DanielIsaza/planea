@extends("layouts.app")

@section("content")
<div class="panel panel-default">
	<div class="panel-heading">Lista de naturalezas de los espacios académicos</div>
    <div class="panel-body">
    	@permission('naturalezas.read')
		<table class="table table-bordered">
			<thead>
				<tr>
					<td>Id</td>
					<td>Nombre</td>
					<td>Acciones</td>
				</tr>
			</thead>
			<tbody>
				@foreach($natures as $nature)
					<tr>
						<td>{{ $nature->id }}</td>
						<td>{{ $nature->nombre }}</td>
						<td>
							<div class="row">
								<div class="col-xs-1">
							@permission('naturalezas.update')
							<a href="{{url('/naturaleza/'.$nature->id.'/edit')}}">
							<i class="material-icons">mode_edit</i></a>
							@endpermission
						</div>
						<div class="col-xs-6">
							@permission('naturalezas.delete')
							@include('natures.delete',['nature'=>$nature])
							@endpermission
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		@endpermission
    </div>
</div>
<div style="float:top; text-align:right;">
	@permission('naturalezas.create')
	<a href="{{url('/descargalognaturalezas')}}" class="btn btn-success btn-fab">
		Descarga log
	</a>
	<a href="{{url('/naturaleza/create')}}" class="btn btn-primary btn-fab">
		<i class="glyphicon glyphicon-plus"></i>
	</a>
	@endpermission
</div>
@endsection
