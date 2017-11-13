@extends('layouts.app')

@section("content")
<div class="panel panel-default">
	<div class="panel-heading">Lista de programas académicos</div>
    <div class="panel-body">
    	@permission('programas.read')
		{!! Field::select('university_id',$universidades,null) !!}
		{!! Field::select('faculty_id') !!}

		<table id = "tabla" class="table table-bordered">
			<thead>
				<tr>
					<td>Id</td>
					<td>Nombre</td>
					<td>Acciones</td>
				</tr>
			</thead>
			<tbody></tbody>
		</table>
		@endpermission
	</div>
</div>
<div style="float:top; text-align:right;">
	@permission('programas.create')
	<a href="{{url('/importarProgramas')}}" class="btn btn-success btn-fab">
		Cargar desde archivo
	</a>
	<a href="{{url('/programasacademicos/create')}}" class="btn btn-primary btn-fab">
		<i class="glyphicon glyphicon-plus"></i>
	<a>
	@endpermission
</div>
@endsection
@section("tabla")
<script>
$.fn.populateTable = function (values){
                var rows = '';
                rows += '<tbody>';
                $.each(values, function(key,row){
					rows += '<tr>';
                    rows += '<td>'+row.value+'</td>';
                    rows += '<td>'+row.text+'</td>';
                    rows += '<td> <div class="row"><div class="col-xs-1">';
                    rows += "@permission('programas.update')";
					rows += "<a href='{{ URL::asset('programasacademicos') }}/"+row.value+"/edit'><i class='material-icons'>mode_edit</i> </a></div>";
					rows += "@endpermission";
					rows += '<div class="col-xs-6">';
					rows += "@permission('programas.delete')";
                    rows += "<form action='{{ URL::asset('programasacademicos') }}/"+row.value+"' method='POST' class='inline-block'>"+
                    	"<input name='_method' type='hidden' value='DELETE'>"+
                    	"<input name='_token' type='hidden' value='{{ csrf_token() }}'>"+
                    	"<button type='submit' class='btn btn-link red-text no-padding no-margin no-transform'><i class='material-icons'>delete_sweep</i></button>"+"</form>";
                    rows += "@endpermission";
					rows += '</div> </div> </td> </tr>';
                });
                rows += '</tbody>';
                $(this).append(rows);
            }
 </script>
@endsection
