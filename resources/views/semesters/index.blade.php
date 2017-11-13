@extends("layouts.app")

@section("content")
<div class="panel panel-default">
		<div class="panel-heading">Lista de semestres</div>
        <div class="panel-body">
        	@permission('semestres.read')
			<table class="table table-bordered">
				<thead>
					<tr>
						<td>Id</td>
						<td>Nombre</td>
						<td>Acciones</td>
					</tr>
				</thead>
				<tbody>
					@foreach($semestres as $semestre)
						<tr>
							<td>{{ $semestre->id }}</td>
							<td>{{ $semestre->nombre }}</td>
							<td>
								<div class="row">
									@permission('semestres.update')
									<div class="col-xs-1">
										<a href="{{url('/semestres/'.$semestre->id.'/edit')}}">
											<i class="material-icons">mode_edit</i></a>
										</a>
									@endpermission
								</div>
								<div class="col-xs-6">
									@permission('semestres.delete')
									@include('semesters.delete',['semestre'=>$semestre])
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
		<div style="float:top; text-align:right;">
			@permission('semestres.create')
			<a href="{{url('/semestres/create')}}" class="btn btn-primary btn-fab">
				<i class="glyphicon glyphicon-plus"></i>
			</a>
			@endpermission
		</div>
</div>

@endsection
