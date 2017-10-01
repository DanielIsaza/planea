@extends("layouts.app")

@section("content")
<div class="panel panel-default">
	<div class="panel-heading">Crear tipo de metodología</div>
    <div class="panel-body">
		@include('typemethodologies.form',['tipometodologia'=>$tipometodologia,'url' => '/tiposmetodologias','method'=>'POST'])
	</div>
</div>
@endsection