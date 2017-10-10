@extends("layouts.app")

@section("content")
<div class="panel panel-default">
	<div class="panel-heading">Lista de áreas de conocimiento</div>
    <div class="panel-body">
		<table class="table table-bordered">
			<thead>
				<tr>
					<td>Id</td>
					<td>Nombre</td>
					<td>Acciones</td>
				</tr>
			</thead>
			<tbody>
				@foreach($areas as $area)
					<tr>
						<td>{{ $area->id }}</td>
						<td>{{ $area->nombre }}</td>
						<td>
							<div class="row">
								<div class="col-xs-1">
							<a href="{{url('/areasconocimiento/'.$area->id.'/edit')}}">
							<i class="material-icons">mode_edit</i></a>
						</div>
						<div class="col-xs-6">
							@include('knowledgeareas.delete',['area'=>$area])
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
	<a href="{{url('/areasconocimiento/create')}}" class="btn btn-primary btn-fab">
		<i class="glyphicon glyphicon-plus"></i>
	</a>
</div>
@endsection
