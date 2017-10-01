@extends("layouts.app")

@section("content")
<div class="panel panel-default">
	<div class="panel-heading">Crear universidades</div>
    <div class="panel-body">
		@include('universities.form',['universidad'=>$universidad,'url' => '/universidades','method'=>'POST'])
	</div>
</div>
@endsection