@extends("layouts.app")

@section("content")
<div class="panel panel-default">
	<div class="panel-heading">Editar facultad</div>
    <div class="panel-body">
		@include('faculties.form',[['facultad'=>$facultad,'universidades'=>$universidades], 'url' => '/facultades/'.$facultad->id,'method' => 'PUT'])
    </div>
</div>
@endsection