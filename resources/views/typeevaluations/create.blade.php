@extends("layouts.app")

@section("content")
<div class="panel panel-default">
	<div class="panel-heading">Crear tipo de evaluación</div>
    <div class="panel-body">
		@include('typeevaluations.form',['tipoevaluacion'=>$tipoevaluacion,'url' => '/tiposevaluaciones','method'=>'POST'])
	</div>
</div>
@endsection