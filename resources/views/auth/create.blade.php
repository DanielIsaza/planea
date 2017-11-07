@extends("layouts.app")

@section("content")
<div class="panel panel-default">
	<div class="panel-heading">Crear usuario</div>
    <div class="panel-body">
		@include('auth.form',['usuario'=>$usuario,'url' => '/usuarios','method'=>'POST'])
	</div>
</div>
@endsection