@extends("layouts.app")

@section("content")
<div class="panel panel-default">
	<div class="panel-heading">Crear estado</div>
    <div class="panel-body">

		@include('states.form',['estado'=>$estado,'url' => '/estados','method'=>'POST'])
	</div>
</div>
@endsection