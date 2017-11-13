@extends("layouts.app")

@section("content")
<div class="panel panel-default">
	<div class="panel-heading">Lista de planes académicos</div>
    <div class="panel-body">
    	@permission('planes.read')
		{!! Form::model(['method'=>'POST','class'=>'form']) !!}

			{!! Field::select('university_id',$universidades) !!}
			{!! Field::select('faculty_id') !!}
			{!! Field::select('academicprogram_id') !!}

		{!! Form::close() !!}

		<table id="tabla" class="table table-bordered">
			<thead>
				<tr>
					<td>Id</td>
					<td>Nombre</td>
					<td>Estado</td>
					<td>Acciones</td>
				</tr>
			</thead>
			<tbody>

			</tbody>
		</table>
		@endpermission
	</div>
</div>
<div style="float:top; text-align:right;">
	@permission('planes.create')
	<a href="{{url('/importarPlanes')}}" class="btn btn-success btn-fab">
		Cargar desde archivo
	</a>
	<a href="{{url('/planesacademicos/create')}}" class="btn btn-primary btn-fab">
		<i class="glyphicon glyphicon-plus"></i>
	</a>
	@endpermission
</div>
@endsection

@section("tabla")
<script type="text/javascript">
	$.fn.populateTable = function (values){
                var rows = '';
                rows += '<tbody>';
                $.each(values, function(key,row){
                	rows += '<tr>';
                    rows += '<td>'+row.value+'</td>';
                    rows += '<td>'+row.text+'</td>';
                    rows += '<td>'+row.estado+'</td>'
                    rows += '<td><div class="row"><div class="col-xs-1">';
                    rows +=	"@permission('planes.create')";
					rows += "<a href='{{ URL::asset('planesacademicos') }}/"+row.value+"/edit'><i class='material-icons'>mode_edit</i> </a> </div>	";
					rows += "@endpermission";
					rows += '<div class="col-xs-6">';
					rows +=	"@permission('planes.create')";
					rows += "<form action='{{ URL::asset('planesacademicos') }}/"+row.value+"' method='POST' class='inline-block'>"+
                    	"<input name='_method' type='hidden' value='DELETE'>"+
                   		"<input name='_token' type='hidden' value='{{ csrf_token() }}'>"+
                    	"<button type='submit' class='btn btn-link red-text no-padding no-margin no-transform'><i class='material-icons'>delete_sweep</i></button>"+"</form>";
                    rows += "@endpermission";
					rows += '</div></div></td></tr>';
                });
                rows += '</tbody>';
                $(this).append(rows);
            }
</script>
@endsection
