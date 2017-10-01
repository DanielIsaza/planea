@extends("layouts.app")

@section("content")
<div class="panel panel-default">
	<div class="panel-heading">Editar tipo de evaluación</div>
    <div class="panel-body">
		@include('typeevaluations.form',['tipoevaluacion'=>$tipoevaluacion, 'url' => '/tiposevaluaciones/'.$tipoevaluacion->id,'method' => 'PUT'])
	</div>
</div>
@endsection