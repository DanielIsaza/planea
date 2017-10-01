@extends("layouts.app")

@section("content")
<div class="panel panel-default">
	<div class="panel-heading">Editar peso espacio - objetivo</div>
    <div class="panel-body">
		{!!Form::open(['url'=> '/asignacion/'.$objetivoes->id,'method' =>'PUT']) !!}

			<div class="row">
				<div class="col-md-4">{!! Field::select('university_id',$universidades,$idUniversidad) !!}</div>
				<div class="col-md-4">{!! Field::select('faculty_id',$facultades,$idFacultad) !!}</div>
				<div class="col-md-4">{!! Field::select('academicprogram_id',$programas,$idPrograma) !!}</div>
			</div>
		 
			<div class="row">
				
				<div class="col-md-6">{!! Field::select('academicplan_id',$planes,$idPlan) !!}</div>
				<div class="col-md-6">{!! Field::select('ability_id',$habilidades,$idHabilidad) !!}</div>
				
			</div>
			<div class="row">
				<div class="col-md-4">{!! Field::select('academicspace_id',$espacios,$objetivoes->academicspace_id) !!}</div>
				<div class="col-md-4">
					{{ Form::label('Peso')}}
					{{ Form::text('peso',$peso,['class' => 'form-control',
						'placeholder'=>'Peso del espacio sobre el objetivo']) }}
				</div>
				<div class="col-md-4">{!! Field::select('objective_id',$objetivos,$objetivoes->objective_id) !!}</div>
			</div>
			
		<div class="form-group text-	">
			<a href="{{url('/asignacion')}}">Regresar al resumen</a>
			<input type="submit" value="Guardar" class="btn btn-success">
		</div>
		{!! Form::close() !!}
	</div>
</div>
@endsection