@extends("layouts.app")

@section("content")
<div class="panel panel-default">
	<div class="panel-heading">Crear rol</div>
    <div class="panel-body">
		@include('roles.form',['rol'=>$rol,'url' => '/roles','method'=>'POST'])
	</div>
</div>
@endsection