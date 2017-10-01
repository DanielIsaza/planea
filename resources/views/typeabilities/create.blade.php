@extends("layouts.app")

@section("content")
<div class="panel panel-default">
	<div class="panel-heading">Crear tipo de habilidad</div>
    <div class="panel-body">
		@include('typeabilities.form',['tiposhabilidad'=>$tiposhabilidad,'url' => '/tiposhabilidad','method'=>'POST'])
	</div>
</div>
@endsection