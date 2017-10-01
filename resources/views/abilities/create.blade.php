@extends("layouts.app")

@section("content")
<div class="panel panel-default">
	<div class="panel-heading">Crear habilidad</div>
    <div class="panel-body">
		{!!Form::open(['url'=> '/habilidades','method' =>'POST']) !!}
			<div class="row">
				<div class="col-md-3">{!! Field::select('university_id',$universidades) !!}</div>
				<div class="col-md-3">{!! Field::select('faculty_id') !!}</div>
				<div class="col-md-3">{!! Field::select('academicprogram_id') !!}</div>
				<div class="col-md-3">{!! Field::select('academicplan_id') !!}</div>
			</div>

			<div class="row">
				<div class="col-md-4">
					{{ Form::label('Tipo de habilidad')}}
					{!! Form::select('typeability_id',$tiposh,null,['class'=> 'form-control','placeholder'=>'Seleccione una opción','required']) !!}
				</div>
				<div class="col-md-4">
					{{ Form::label('Nombre de la habilidad')}}
					{{ Form::text('nombre',null,['class' => 'form-control',
							'placeholder'=>'Nombre de la nueva habilidad ']) }}
				</div>
				<div class="col-md-4">
					{{ Form::label('Peso especifico de la habilidad')}}
					{{ Form::text('peso',null,['class' => 'form-control',
							'placeholder'=>'Peso específico de la habilidad ']) }}
				</div>
			</div>
			<div class="form-group text-	">
				<a href="{{url('/habilidades')}}">Regresar al listado de habilidades</a>
				<input type="submit" value="Guardar" class="btn btn-success">
			</div>
		{!! Form::close() !!}
	</div>
</div>
@endsection