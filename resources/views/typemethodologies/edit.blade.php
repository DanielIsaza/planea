@extends("layouts.app");

@section("content")
<div class="panel panel-default">
	<div class="panel-heading">Editar tipo de metodología</div>
    <div class="panel-body">
		@include('typemethodologies.form',['tipometodologia'=>$tipometodologia, 'url' => '/tiposmetodologias/'.$tipometodologia->id,'method' => 'PUT'])
	</div>
</div>
@endsection