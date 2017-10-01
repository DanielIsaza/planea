@extends("layouts.app")

@section("content")
<div class="panel panel-default">
	<div class="panel-heading">Crear objetivo</div>
    <div class="panel-body">
		{!!Form::open(['url'=> '/objetivos','method' =>'POST']) !!}

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
				<div class="col-md-6">
					{{ Form::label('Nombre del objetivo')}}
					{{ Form::text('nombre',null,['class' => 'form-control',
							'placeholder'=>'Nombre']) }}
				</div>
				<div class="col-md-6">
					{{ Form::label('Peso')}}
					{{ Form::text('peso',null,['class' => 'form-control',
							'placeholder'=>'Peso del objetivo sobre la habilidad']) }}
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-10">
					{{ Form::label('Descripción') }}
					{{ Form::textarea('descripcion',null,['class'=>'form-control',
						'placeholder'=>'Descripción del objetivo']) }}
				</div>
			</div>
			<div class="form-group text-	">
				<a href="{{url('/objetivos')}}">Regresar al listado de objetivos</a>
				<input type="submit" value="Guardar" class="btn btn-success">
			</div>
		{!! Form::close() !!}
	</div>
</div>
@endsection
