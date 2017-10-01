@extends("layouts.app")

@section("content")
<div class="panel panel-default">
	<div class="panel-heading">Asignar permisos</div>
    <div class="panel-body">
    {!! Form::open(['url'=>'/autoriza/','method'=> 'POST']) !!}
	    <div class="row">
		    <div class="col-xs-4">
		    	{!! Field::select('user_id',$usuarios,null) !!}
		    </div>
		    <div class="col-xs-4">
		    	{!! Field::select('academicprogram_id',$programas,null) !!}
		    </div>
		    <div class="col-xs-2">
		    	{!! Field::select('rol_id',$roles,null) !!}
		    </div>
		    <div class="col-xs-2">
		    	<input type="submit" value="Asignar" class="btn btn-success">
		    </div>
	    </div>
	{!! Form::close() !!}
	    <div>
	    	<table id="tbpermisos" class="table table-bordered">
	    		<thead>
	    			<tr>
	    				<td>Usuario</td>
	    				<td>Programa académico</td>
	    				<td>Rol asignado</td>
	    				<td>Acciones</td>
	    			</tr>
	    		</thead>
	    		<tbody>
	    		@foreach($permisos as $permiso)
	    			<tr>
	    				<td>{{ $permiso->usuario }}</td>
	    				<td>{{ $permiso->programa }}</td>
	    				<td>{{ $permiso->rol }}</td>
	    				<td>@include('autorizes.delete',['permiso'=>$permiso])</td>
	    			</tr>
	    		@endforeach
	    		</tbody>
	    	</table>

	    </div>
    </div>
</div>
@endsection
