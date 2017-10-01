@extends("layouts.app")

@section("content")
<div class="panel panel-default">
	<div class="panel-heading">Crear naturaleza</div>
    <div class="panel-body">
		@include('natures.form',['nature'=>$nature,'url' => '/naturaleza','method'=>'POST'])
    </div>
</div>
@endsection