@extends("layouts.app")

@section("content")
<div class="panel panel-default">
	<div class="panel-heading">Editar naturaleza</div>
    <div class="panel-body">
		@include('natures.form',['nature'=>$nature, 'url' => '/naturaleza/'.$nature->id,'method' => 'PUT'])
    </div>
</div>
@endsection