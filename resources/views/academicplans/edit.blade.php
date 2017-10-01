@extends("layouts.app")

@section("content")
<div class="panel panel-default">
	<div class="panel-heading">Editar plan académico</div>
    <div class="panel-body">
		{!!Form::open(['url'=> '/planesacademicos/'.$plan->id,'method' => 'PUT']) !!}
			{!! Field::select('university_id',$universidades,1) !!}
			{!! Field::select('faculty_id',$facultades,$idfacultad) !!}
			{!! Field::select('academicprogram_id',$programas,$plan->academicprogram_id) !!}
			{!! Field::select('state_id',$estados,$plan->state_id,['required'=>'required']) !!}
			{{ Form::label('nombre del plan académico')}}
			{{ Form::text('nombre',$plan->nombre,['class' => 'form-control',
				'placeholder'=>'Ingrese un nombre ']) }}
			<br>
			{{ Form::label('Descripción del perfil')}}
			{{ Form::textarea('descripcion',$plan->perfil,['class' => 'form-control']) }}
			
			<div class="form-group">
				<a href="{{url('/planesacademicos')}}">Regresar al listado de programas</a>
				<input type="submit" value="Guardar" class="btn btn-success">
			</div>
		{!! Form::close() !!}
	</div>
</div>
@endsection