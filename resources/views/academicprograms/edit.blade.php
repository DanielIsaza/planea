@extends("layouts.app")

@section("content")
<div class="panel panel-default">
	<div class="panel-heading">Editar programa académico</div>
    <div class="panel-body">
		{!!Form::open(['url'=> '/programasacademicos/'.$programa->id,'method' => 'PUT']) !!}
			{!! Field::select('university_id',$universidades,1) !!}
			{!! Field::select('faculty_id',$facultades,$programa->faculty_id) !!}
			{{ Form::label('Nombre')}}
			{{ Form::text('nombre',$programa->nombre,['class' => 'form-control']) }}
			<div class="form-group">
				<a href="{{url('/programasacademicos')}}">Regresar al listado de programas</a>
				<input type="submit" value="Guardar" class="btn btn-success">
			</div>
		{!! Form::close() !!}
    </div>
</div>
@endsection