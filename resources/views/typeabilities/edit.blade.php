@extends("layouts.app")

@section("content")
<div class="panel panel-default">
	<div class="panel-heading">Editar tipo de habilidad</div>
    <div class="panel-body">
		@include('typeabilities.form',['tiposhabilidad'=>$tiposhabilidad, 'url' => '/tiposhabilidad/'.$tiposhabilidad->id,'method' => 'PUT'])
	</div>
</div>
@endsection