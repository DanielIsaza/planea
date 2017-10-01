@extends('layouts.app')
@section("content")
<div class="panel panel-default">
	<div class="panel-heading">Editar universidades</div>
    <div class="panel-body">
			@include('universities.form',['universidad'=>$universidad, 'url' => '/universidades/'.$universidad->id,'method' => 'PUT'])
	</div>
</div>
@endsection
