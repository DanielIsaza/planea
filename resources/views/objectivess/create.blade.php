@extends("layouts.app")

@section("content")
<div class="panel panel-default">
	<div class="panel-heading">Asignar peso espacio - objetivo</div>
    <div class="panel-body">

	{!!Form::open(['url'=> '/asignacion','method' =>'POST']) !!}

		<div class="row">
			<div class="col-md-4">{!! Field::select('university_id',$universidades) !!}</div>
			<div class="col-md-4">{!! Field::select('faculty_id') !!}</div>
			<div class="col-md-4">{!! Field::select('academicprogram_id') !!}</div>
		</div>

		<div class="row">
			<div class="col-md-6">{!! Field::select('academicplan_id') !!}</div>
			<div class="col-md-6">{!! Field::select('ability_id') !!}</div>

		</div>
		<div class="row">
			<div class="col-md-4">{!! Field::select('academicspace_id') !!}</div>
			<div class="col-md-4">{!! Field::select('objective_id') !!}</div>
			<div class="col-md-4">
				{{ Form::label('Peso')}}
				{{ Form::text('peso',null,['class' => 'form-control',
					'placeholder'=>'Peso del espacio sobre el objetivo']) }}
			</div>
		</div>
		<div class="form-group text-	">
			<a href="{{url('/asignacion')}}">Regresar al resumen</a>
			<input type="submit" value="Guardar" class="btn btn-success">
		</div>
		{!! Form::close() !!}
	</div>
</div>
@endsection
