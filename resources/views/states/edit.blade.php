@extends("layouts.app")

@section("content")
<div class="panel panel-default">
	<div class="panel-heading">Editar estado</div>
    <div class="panel-body">
		@include('states.form',['estado'=>$estado, 'url' => '/estados/'.$estado->id,'method' => 'PUT'])
	</div>
</div>
@endsection