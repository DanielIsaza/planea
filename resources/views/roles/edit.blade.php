@extends("layouts.app")

@section("content")
<div class="panel panel-default">
	<div class="panel-heading">Editar rol</div>
    <div class="panel-body">
		@include('roles.form',['rol'=>$rol, 'url' => '/roles/'.$rol->id,'method' => 'PUT'])
	</div>
</div>
@endsection