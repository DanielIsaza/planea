@extends("layouts.app")

@section("content")
<div class="panel panel-default">
	<div class="panel-heading">Crear programa académico</div>
    <div class="panel-body">
		{!!Form::open(['url'=> '/programasacademicos/','method' => 'POST']) !!}
			{!! Field::select('university_id',$universidades,null) !!}
			{!! Field::select('faculty_id') !!}
			{{ Form::label('Nombre')}}
			{{ Form::text('nombre',null,['class' => 'form-control']) }}
			<div class="form-group">
				<a href="{{url('/programasacademicos')}}">Regresar al listado de programas</a>
				<input type="submit" value="Guardar" class="btn btn-success">
			</div>
		{!! Form::close() !!}
    </div>
</div>
@endsection