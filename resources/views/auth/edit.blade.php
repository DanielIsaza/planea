@extends("layouts.app")

@section("content")
<div class="panel panel-default">
	<div class="panel-heading">Editar usuario</div>
    <div class="panel-body">
		@include('auth.form',['usuario'=>$usuario, 'url' => '/usuarios/'.$usuario->id,'method' => 'PUT'])
	</div>
</div>
@endsection