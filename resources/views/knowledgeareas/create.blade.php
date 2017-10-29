@extends("layouts.app")

@section("content")
<div class="panel panel-default">
	<div class="panel-heading">Crear área de conocimiento</div>
    <div class="panel-body">
    	{!!Form::open(['url'=> '/areasconocimiento','method' => 'POST']) !!}
	    	<div class="row">
				<div class="col-md-6">{!! Field::select('university_id',$universidades,null) !!}</div>
				<div class="col-md-6">{!! Field::select('faculty_id') !!}</div>
			</div>
			<div class="row">
				<div class="col-md-6">{!! Field::select('academicprogram_id') !!}</div>
				<div class="col-md-6">{!! Field::select('academicplan_id') !!}</div>
			</div>
			<div class="form-group">
				{{ Form::label('Nombre') }}
				{{ Form::text('nombre',$area->nombre,['class' => 'form-control',
				'placeholder'=>'Nombre del área de conocimiento']) }}
			</div>
			<div class="form-group text-	">
				<a href="{{url('/areasconocimiento')}}">Regresar al listado de áreas</a>
				<input type="submit" value="Guardar" class="btn btn-success">
			</div>
		{!! Form::close() !!}
	</div>
</div>
@endsection