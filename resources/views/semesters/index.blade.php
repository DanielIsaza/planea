@extends("layouts.app")

@section("content")
<div class="panel panel-default">
		<div class="panel-heading">Lista de semestres</div>
        <div class="panel-body">
			<table class="table table-bordered">
				<thead>
					<tr>
						<td>Nombre</td>
						<td>Acciones</td>
					</tr>
				</thead>
				<tbody>
					@foreach($semestres as $semestre)
						<tr>
							<td>{{ $semestre->nombre }}</td>
							<td>
								<div class="row">
									<div class="col-xs-1">
								<a href="{{url('/semestres/'.$semestre->id.'/edit')}}">
									<i class="material-icons">mode_edit</i></a>
								</a>
							</div>
							<div class="col-xs-6">
								@include('semesters.delete',['semestre'=>$semestre])
							</div>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
    </div>
		<div style="float:top; text-align:right;">
			<a href="{{url('/semestres/create')}}" class="btn btn-primary btn-fab">
				<i class="glyphicon glyphicon-plus"></i>
			</a>
		</div>
</div>

@endsection
