@extends("layouts.app")

@section("content")
<div class="panel panel-default">
		<div class="panel-heading">Lista de tipos de habilidad</div>
        <div class="panel-body">
			<table class="table table-bordered">
				<thead>
					<tr>
						<td>Nombre</td>
						<td>Acciones</td>
					</tr>
				</thead>
				<tbody>
					@foreach($tiposHabilidades as $tipoHabilidad)
						<tr>
							<td>{{ $tipoHabilidad->nombre }}</td>
							<td>
								<div class="row">
									<div class="col-xs-1">
								<a href="{{url('/tiposhabilidad/'.$tipoHabilidad->id.'/edit')}}">
								<i class="material-icons">mode_edit</i></a>
							</div>
							<div class="col-xs-6">
								@include('typeabilities.delete',['tipoHabilidad'=>$tipoHabilidad])
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
	<a href="{{url('/tiposhabilidad/create')}}" class="btn btn-primary btn-fab">
<i class="glyphicon glyphicon-plus"></i>
	</a>
</div>
@endsection
