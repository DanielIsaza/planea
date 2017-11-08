@extends("layouts.app")

@section("content")
<div class="panel panel-default">
	<div class="panel-heading">Editar espacio académico</div>
    <div class="panel-body">
		{!!Form::open(['url'=> '/espaciosacademicos/'.$espacio->id,'method' => 'PUT']) !!}
			<div class="row" style="margin:0px 10px 20px;">
			   	<div class="col-md-3">{!! Field::select('university_id',$universidades,$idUniversidad) !!}</div>
			    <div class="col-md-3">{!! Field::select('faculty_id',$facultades,$idFacultad) !!}</div>
			    <div class="col-md-3">{!! Field::select('academicprogram_id',$programas,$idPrograma) !!}</div>
			    <div class="col-md-3">{!! Field::select('academicplan_id',$planes,$espacio->academicplan_id) !!}</div>
			</div>
			<div class="row" style="margin:0px 10px 20px;">
			  	<div class="col-md-4">{!! Field::select('semester_id',$semestres,$espacio->semester_id) !!}</div>
			  	<div class="col-md-4">
			  		{{ Form::label('Código')}}
					{{ Form::text('codigo',$espacio->codigo,['class' => 'form-control', 
					'placeholder'=>'Código del espacio académico']) }}
			  	</div>
			  	<div class="col-md-4">
		  			{{ Form::label('Nombre')}}
					{{ Form::text('nombre',$espacio->nombre,['class' => 'form-control',
					'placeholder'=>'Nombre del espacio académico']) }}
		  		</div>
			</div>
			<hr size="10" width="100%" />
			<div class="row" style="margin:0px 10px 20px;">
		  		<div class="col-md-3">
		  			{{ Form::label('Número de creditos')}}
					{{ Form::text('numeroCreditos',$espacio->numeroCreditos,['class' => 'form-control',
					'placeholder'=>'Número de creditos del espacio académico']) }}
		  		</div>
			  	<div class="col-md-3">
		  			{{ Form::label('Horas semanales')}}
					{{ Form::text('horasSemanales',$espacio->horasSemanales,['class' => 'form-control',
							'placeholder'=>'Horas semanales']) }}
		  		</div>
		  		<div class="col-md-3">
		  			{{ Form::label('Horas teóricas')}}
					{{ Form::text('horasTeoricas',$espacio->horasTeoricas,['class' => 'form-control',
					'placeholder'=>'Horas teóricas del espacio académico']) }}
		  		</div>
		  		<div class="col-md-3">
		  			{{ Form::label('Horas prácticas')}}
					{{ Form::text('horasPracticas',$espacio->horasPracticas,['class' => 'form-control',
					'placeholder'=>'Horas prácticas del espacio académico']) }}
		  		</div>
		  	</div>
		  	<div class="row" style="margin:0px 10px 20px;">
		  		<div class="col-md-3">
		  			{{ Form::label('Horas teórico prácticas')}}
					{{ Form::text('horasTeoPract',$espacio->horasTeoPract,['class' => 'form-control',
					'placeholder'=>'Horas teórico-prácticas del espacio académico']) }}
		  		</div>
		  		<div class="col-md-3">
		  			{{ Form::label('Horas asesoría')}}
					{{ Form::text('horasAsesorias',$espacio->horasAsesorias,['class' => 'form-control',
					'placeholder'=>'Horas de asesoría del espacio académico']) }}
		  		</div>
		  		<div class="col-md-3">
		  			{{ Form::label('Horas independiente')}}
					{{ Form::text('horasIndependiente',$espacio->horasIndependiente,['class' => 'form-control',
					'placeholder'=>'Horas independiente del espacio académico']) }}
		  		</div>
			  	<div class="col-md-3">{!! Field::select('activityacademic_id',$actividadesAca,$espacio->activityacademic_id) !!}</div>
		  	</div>
		  	<hr size="10" width="100%" />
		  	<div class="row" style="margin:0px 10px 20px;">
		  		<div class="col-md-3" style="margin-top: 2%">
		  			{{ Form::label('Habilitable?')}}
					{{ Form::checkbox('habilitable','',$espacio->habilitable) }}
				</div>
				<div class="col-md-3" style="margin-top: 2%">
		  			{{ Form::label('Validable?')}}
					{{ Form::checkbox('validable','',$espacio->validable) }}
				</div>
				<div class="col-md-3" style="margin-top: 2%">
		  			{{ Form::label('Homologable')}}
					{{ Form::checkbox('homologable','',$espacio->homologable) }}
				</div>
		  		<div class="col-md-3">{!! Field::select('typeevaluation_id',$tipoEvaluaciones,$espacio->typeevaluation_id) !!}</div>
		  	</div>
		  	<div class="row" style="margin:0px 10px 20px;">
		  		<div class="col-md-4">{!! Field::select('typemethodology_id',$tipoMetodologias,$espacio->typemethodology_id) !!}</div>
		  		<div class="col-md-4">{!! Field::select('nature_id',$naturalezas,$espacio->nature_id) !!}</div>
		  		<div class="col-md-4">{!! Field::select('knowledgearea_id',$areas,$espacio->knowledgearea_id) !!}</div>
		  	</div>
		  	<div class="row" style="margin:0px 10px 20px;">
				<div class="col-md-6" id="drequisitos">
					{!! Field::select('Requisitos[]',$espacios,$requisito,['class'=> 'form-control espacios','multiple']) !!}
				</div>
				<div class="col-md-6" id="dcorequisito">
					{!! Field::select('Co-Requisitos[]',$espacios,$corequisito,['class'=> 'form-control espacios','multiple']) !!}
				</div>
			</div>
			<hr size="10" width="100%" />
			<div class="row" style="margin:0px 10px 20px;">
				<div class="col-md-13">
					{{ Form::label('Competencias propias')}}
					{{ Form::textarea('competenciasPropias',$espacio->competenciasPropias,['class' => 'form-control',
						'placeholder'=>'Núcleo temático del espacio académico']) }}
				</div>
			</div>
			<hr size="10" width="100%" />
			<div class="row" style="margin:0px 10px 20px;">
				<div class="col-md-13">
					{{ Form::label('Núcleo temático')}}
					{{ Form::textarea('nucleoTematico',$espacio->nucleoTematico,['class' => 'form-control',
					'placeholder'=>'Núcleo temático del espacio académico']) }}
				</div>
			</div>
			<hr size="10" width="100%" />
			<div class="row" style="margin:0px 10px 20px;">
				<div class="col-md-13">
					{{ Form::label('Justificación')}}
					{{ Form::textarea('justificacion',$espacio->justificacion,['class' => 'form-control',
					'placeholder'=>'Justificación del espacio académico']) }}
				</div>
			</div>
			<hr size="10" width="100%" />
			<div class="row" style="margin:0px 10px 20px;">
				<div class="col-md-13">
					{{ Form::label('Metodología')}}
					{{ Form::textarea('metodologia',$espacio->metodologia,['class' => 'form-control',
					'placeholder'=>'Metodología del espacio académico']) }}
				</div>
			</div>
			<hr size="10" width="100%" />
			<div class="row" style="margin:0px 10px 20px;">
				<div class="col-md-13">
					{{ Form::label('Evaluación')}}
					{{ Form::textarea('evaluacion',$espacio->evaluacion,['class' => 'form-control',
					'placeholder'=>'Evaluación del espacio académico']) }}
				</div>
			</div>
			<hr size="10" width="100%" />
			<div class="row" style="margin:0px 10px 20px;">
				<div class="col-md-13">
					{{ Form::label('Descripción')}}
					{{ Form::textarea('descripcion',$espacio->descripcion,['class' => 'form-control',
					'placeholder'=>'Descripción del espacio académico']) }}
				</div>
			</div>
			<hr size="10" width="100%" />
			<div class="row" style="margin:0px 10px 20px;">
				<div class="col-md-13">
					{{ Form::label('Contenido conceptual')}}
					{{ Form::textarea('contenidoConceptual',$espacio->contenidoConceptual,['class' => 'form-control',
					'placeholder'=>'Contenido conceptual del espacio académico']) }}
				</div>
			</div>
			<hr size="10" width="100%" />
			<div class="row" style="margin:0px 10px 20px;">
				<div class="col-md-13">
					{{ Form::label('Contenido procedimental')}}
					{{ Form::textarea('contenidoProcedimental',$espacio->contenidoProcedimental,['class' => 'form-control','placeholder'=>'Contenido procedimental del espacio académico']) }}
				</div>
			</div>
			<hr size="10" width="100%" />
			<div class="row" style="margin:0px 10px 20px;">
				<div class="col-md-13">
					{{ Form::label('Contenido actitudinal')}}
					{{ Form::textarea('contenidoActitudinal',$espacio->contenidoActitudinal,['class' => 'form-control',
					'placeholder'=>'Justificación del espacio académico']) }}
				</div>
			</div>
			<hr size="10" width="100%" />
			<div class="row" style="margin:0px 10px 20px;">
				<div class="col-md-13">
					{{ Form::label('Procesos integrativos')}}
					{{ Form::textarea('procesosIntegrativos',$espacio->procesosIntegrativos,['class' => 'form-control',
					'placeholder'=>'Procesos integrativos del espacio académico']) }}
				</div>
			</div>
			<hr size="10" width="100%" />
			<div class="row" style="margin:0px 10px 20px;">
				<div class="col-md-13">
					{{ Form::label('Unidades')}}
					{{ Form::textarea('unidades',$espacio->unidades,['class' => 'form-control',
					'placeholder'=>'Unidades del espacio académico']) }}
				</div>
			</div>
			<hr size="10" width="100%" />
			<div class="row" style="margin:0px 10px 20px;">
				<div class="col-md-13">
					{{ Form::label('Bibliografía')}}
					{{ Form::textarea('bibliografia',$espacio->bibliografia,['class' => 'form-control',
						'placeholder'=>'Bibliografía del espacio académico']) }}
				</div>
			</div>
			<hr size="10" width="100%" />
			<div class="row" style="margin:0px 10px 20px;">
				<div class="col-md-13">
					{{ Form::label('Recursos electrónicos')}}
					{{ Form::textarea('recursosElectronicos',$espacio->recursosElectronicos,['class' => 'form-control',
						'placeholder'=>'Recursos electrónicos del espacio académico']) }}
				</div>
			</div>
			<hr size="10" width="100%" />
			<div class="row" style="margin:0px 10px 20px;">
				<div class="col-md-13">
					{{ Form::label('Historial de revisión')}}
					{{ Form::textarea('historialRevision',$espacio->historialRevision,['class' => 'form-control',
						'placeholder'=>'Historial de revisión del syllabus']) }}
				</div>
			</div>
			<hr size="10" width="100%" />
			<div class="row" style="margin:0px 10px 20px;">
				<div class="col-md-13">
					{{ Form::label('Vigencia')}}
					{{ Form::textarea('vigencia',$espacio->vigencia,['class' => 'form-control',
						'placeholder'=>'Vigencia del syllabus']) }}
				</div>
			</div>
			<hr size="10" width="100%" />
			<div class="row" style="margin:0px 10px 20px;">
				<div class="col-md-13">
					{{ Form::label('Responsables')}}
					{{ Form::textarea('responsables',$espacio->responsables,['class' => 'form-control',
						'placeholder'=>'Responsables del syllabus']) }}
				</div>
			</div>
		{!! Form::close() !!}
	</div>
</div>
<div class="form-group" style="text-align:right">
	<a href="{{url('/espaciosacademicos')}}">Regresar al listado de espacios académicos</a>
	<input type="submit" value="Guardar" class="btn btn-success">
</div>
@endsection
@section("tabla")
	<script> $(function() { $('textarea').froalaEditor() }); 
		$(".espacios").chosen({
				placeholder_text_multiple: 'Seleccione los espacios académicos',
				search_contains: true,
				no_results_text: 'No hay permisos con ese nombre'
		});
	</script>
@endsection	