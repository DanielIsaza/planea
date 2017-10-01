@extends("layouts.app")

@section("content")
<div class="panel panel-default">
	<div class="panel-heading">Crear espacio académico</div>
    <div class="panel-body">
		{!!Form::open(['url'=> '/espaciosacademicos/','method' => 'POST']) !!}
			<div class="row">
		   		<div class="col-md-4">{!! Field::select('university_id',$universidades) !!}</div>
		    	<div class="col-md-4">{!! Field::select('faculty_id') !!}</div>
		    	<div class="col-md-4">{!! Field::select('academicprogram_id') !!}</div>
		  	</div>
		  	<div class="row">
		  		<div class="col-md-4">{!! Field::select('academicplan_id') !!}	</div>
		  		<div class="col-md-4">{!! Field::select('semester_id',$semestres) !!}</div>
		  		<div class="col-md-4">{!! Field::select('activityacademic_id',$actividadesAca) !!}</div>
		  	</div>
		  	<div class="row">
		  		<div class="col-md-3">{!! Field::select('typeevaluation_id',$tipoEvaluaciones) !!}</div>
		  		<div class="col-md-3">{!! Field::select('typemethodology_id',$tipoMetodologias) !!}</div>
		  		<div class="col-md-3">{!! Field::select('nature_id',$naturalezas) !!}</div>
		  		<div class="col-md-3">{!! Field::select('knowledgearea_id',$areas) !!}</div>
		  	</div>
		  	<div class="row">
		  		<div class="col-md-3">
		  			{{ Form::label('Código')}}
						{{ Form::text('codigo',null,['class' => 'form-control',
							'placeholder'=>'Código']) }}
		  		</div>
		  		<div class="col-md-6">
		  			{{ Form::label('Nombre')}}
						{{ Form::text('nombre',null,['class' => 'form-control',
							'placeholder'=>'Nombre']) }}
		  		</div>
		  		<div class="col-md-3">
		  			{{ Form::label('Número de creditos')}}
						{{ Form::text('numeroCreditos',null,['class' => 'form-control',
							'placeholder'=>'Número de creditos']) }}
		  		</div>
		  	</div>
		  	<div class="row">
		  		<div class="col-md-3">
		  			{{ Form::label('Horas teóricas')}}
						{{ Form::text('horasTeoricas',null,['class' => 'form-control',
							'placeholder'=>'Horas teóricas']) }}
		  		</div>
		  		<div class="col-md-3">
		  			{{ Form::label('Horas prácticas')}}
						{{ Form::text('horasPracticas',null,['class' => 'form-control',
							'placeholder'=>'Horas prácticas']) }}
		  		</div>
		  		<div class="col-md-3">
		  			{{ Form::label('Horas teórico prácticas')}}
						{{ Form::text('horasTeoPract',null,['class' => 'form-control',
							'placeholder'=>'Horas teórico-prácticas']) }}
		  		</div>
		  		<div class="col-md-3">
		  			{{ Form::label('Horas asesoría')}}
						{{ Form::text('horasAsesorias',null,['class' => 'form-control',
							'placeholder'=>'Horas de asesoría']) }}
		  		</div>
		  	</div>

			<div class="row" style="">
				<div class="col-md-3">
		  			{{ Form::label('Horas independiente')}}
						{{ Form::text('horasIndependiente',null,['class' => 'form-control',
							'placeholder'=>'Horas independiente']) }}
		  		</div>
		  		<div class="col-md-3" style="margin-top: 2%">
		  			{{ Form::label('Habilitable?')}}
					{{ Form::checkbox('habilitable') }}
				</div>
				<div class="col-md-3" style="margin-top: 2%">
		  			{{ Form::label('Validable?')}}
					{{ Form::checkbox('validable') }}
				</div>
				<div class="col-md-3" style="margin-top: 2%">
		  			{{ Form::label('Homologable')}}
					{{ Form::checkbox('homologable') }}
				</div>
		  	</div>
			<div class="row">
				<div class="col-md-6" id="drequisitos">
					{{Form::label('Requisitos')}}
					<a id="requisito">
						<i class="material-icons" style="font-size: 1,5em">add_circle</i>
					</a>
				</div>
				<div class="col-md-6" id="dcorequisito">
					{{Form::label('Co-Requisitos')}}
					<a id="corequisito">
						<i class="material-icons" style="font-size: 1,5em">add_circle</i>
					</a>
				</div>
			</div>
			<div class="row">
			<div class="col-md-12">
				{{ Form::label('Núcleo temático')}}
				{{ Form::textarea('nucleoTematico',null,['class' => 'form-control',
					'placeholder'=>'Núcleo temático del espacio académico']) }}
			</div>
			</div>
			<div class="row">
			<div class="col-md-12">
				{{ Form::label('Justificación')}}
				{{ Form::textarea('justificacion',null,['class' => 'form-control',
					'placeholder'=>'Justificación del espacio académico']) }}
			</div>
			</div>
			<div class="row">
			<div class="col-md-12">
				{{ Form::label('Metodología')}}
				{{ Form::textarea('metodologia',null,['class' => 'form-control',
					'placeholder'=>'Metodología del espacio académico']) }}
			</div>
			</div>
			<div class="row">
			<div class="col-md-12">
				{{ Form::label('Evaluación')}}
				{{ Form::textarea('evaluacion',null,['class' => 'form-control',
					'placeholder'=>'Evaluación del espacio académico']) }}
			</div>
			</div>
			<div class="row">
			<div class="col-md-12">
				{{ Form::label('Descripción')}}
				{{ Form::textarea('descripcion',null,['class' => 'form-control',
					'placeholder'=>'Descripción del espacio académico']) }}
			</div>
			</div>
			<div class="row">
			<div class="col-md-12">
				{{ Form::label('Contenido conceptual')}}
				{{ Form::textarea('contenidoConceptual',null,['class' => 'form-control',
					'placeholder'=>'Contenido conceptual del espacio académico']) }}
			</div>
			</div>
			<div class="row">
			<div class="col-md-12">
				{{ Form::label('Contenido procedimental')}}
				{{ Form::textarea('contenidoProcedimental',null,['class' => 'form-control',
					'placeholder'=>'Contenido procedimental del espacio académico']) }}
			</div>
			</div>
			<div class="row">
			<div class="col-md-12">
				{{ Form::label('Contenido actitudinal')}}
				{{ Form::textarea('contenidoActitudinal',null,['class' => 'form-control',
					'placeholder'=>'Justificación del espacio académico']) }}
			</div>
			</div>
			<div class="row">
			<div class="col-md-12">
				{{ Form::label('Procesos integrativos')}}
				{{ Form::textarea('procesosIntegrativos',null,['class' => 'form-control',
					'placeholder'=>'Procesos integrativos del espacio académico']) }}
			</div>
			</div>
			<div class="row">
			<div class="col-md-12">
				{{ Form::label('Unidades')}}
				{{ Form::textarea('unidades',null,['class' => 'form-control',
					'placeholder'=>'Unidades del espacio académico']) }}
			</div>
			</div>
	</div>
</div>
<div class="form-group" style="text-align:right">
	<a href="{{url('/espaciosacademicos')}}">Regresar al listado de espacios académicos</a>
	<input type="submit" value="Guardar" class="btn btn-success">
</div>
{!! Form::close() !!}
@endsection
@section("tabla")
	<script type="text/javascript">
		$('#requisito').click(function (){
			var plan = $('#academicplan_id').val();
			if(plan > -1 && plan != null){
				$('#drequisitos').append('<div class="controls"><select class="form-control" id="a" name="university_id"><option value="" selected="selected"></option><option value="1">Universidad del Quindío</option></select> </div>');

			}else {
				alert('Primero seleccione un plan académico');
			}
		});

		$('#corequisito').click(function (){
			var plan = $('#academicplan_id').val();
			if(plan > -1 && plan != null){
				$('#dcorequisito').append('<div class="controls"><select class="form-control" id="university_id" name="university_id"><option value="" selected="selected"></option><option value="1">Universidad del Quindío</option></select>         </div>');
			}
		});
	</script>
@endsection
