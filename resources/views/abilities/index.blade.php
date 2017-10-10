@extends("layouts.app")

@section("content")
<div class="panel panel-default">
	<div class="panel-heading">Lista de habilidades</div>
    <div class="panel-body">
	{!! Form::model(['method'=>'POST','class'=>'form']) !!}

			<div class="row">
		<div class="col-md-3">{!! Field::select('university_id',$universidades) !!}</div>
		<div class="col-md-3">{!! Field::select('faculty_id') !!}</div>
		<div class="col-md-3">{!! Field::select('academicprogram_id') !!}</div>
		<div class="col-md-3">{!! Field::select('academicplan_id') !!}</div>
	</div>
	 	{!! Form::close() !!}
		<table id = "tabla" class="table table-bordered">
			<thead>
				<tr>
					<td>Nombre</td>
					<td>Peso</td>
					<td>Acciones</td>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
</div>
<div style="float:top; text-align:right;">
	<a href="{{url('/habilidades/create')}}" class="btn btn-primary btn-fab">
	<i class="glyphicon glyphicon-plus"></i>
	</a>
</div>
@endsection
@section('tabla')
	<script type="text/javascript">
		$.fn.populateTable = function (values){
                var rows = '';
                rows += '<tbody>';
                $.each(values, function(key,row){
                	rows += '<tr>';
                    rows += '<td>'+row.text+'</td>';
                    rows += '<td>'+row.peso+'</td>';
                    rows += '<td> <div class="row"> <div class="col-xs-1">';
										rows += "<a href='{{ URL::asset('habilidades') }}/"+row.value+"/edit'><i class='material-icons'>mode_edit</i> </a>";
										rows += '</div><div class="col-xs-6">';
                    rows += "<form action='{{ URL::asset('habilidades') }}/"+row.value+"' method='POST' class='inline-block'>"+
                    "<input name='_method' type='hidden' value='DELETE'>"+
                    "<input name='_token' type='hidden' value='{{ csrf_token() }}'>"+
                    "<button type='submit' class='btn btn-link red-text no-padding no-margin no-transform'><i class='material-icons'>delete_sweep</i></button>"+"</form>";
                    rows += '</div></div></td></tr>';
                });
                rows += '</tbody>';
                $(this).append(rows);
            }
	</script>
@endsection
