@extends("layouts.app")

@section("content")
<div class="panel panel-default">
	<div class="panel-heading">Lista de naturalezas de los espacios académicos</div>
    <div class="panel-body">
		<table class="table table-bordered">
			<thead>
				<tr>
					<td>Nombre</td>
					<td>Acciones</td>
				</tr>
			</thead>
			<tbody>
				@foreach($natures as $nature)
					<tr>
						<td>{{ $nature->nombre }}</td>
						<td>
							<div class="row">
								<div class="col-xs-1">
							<a href="{{url('/naturaleza/'.$nature->id.'/edit')}}">
							<i class="material-icons">mode_edit</i></a>
						</div>
						<div class="col-xs-6">
							@include('natures.delete',['nature'=>$nature])
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>

    </div>
</div>
<div style="float:top; text-align:right;">
	<a href="{{url('/naturaleza/create')}}" class="btn btn-primary btn-fab">
		<i class="glyphicon glyphicon-plus"></i>
	</a>
</div>
@endsection
