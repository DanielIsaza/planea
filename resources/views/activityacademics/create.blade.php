@extends("layouts.app")

@section("content")
<div class="panel panel-default">
	<div class="panel-heading">Crear actividad académica</div>
    <div class="panel-body">
		@include('activityacademics.form',['actividad'=>$actividad,'url' => '/actividadesacademicas','method'=>'POST'])
	</div>
</div>
@endsection