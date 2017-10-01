@extends("layouts.app")

@section("content")
<div class="panel panel-default">
	<div class="panel-heading">Editar área de conocimiento</div>
    <div class="panel-body">
		@include('knowledgeareas.form',['area'=>$area, 'url' => '/areasconocimiento/'.$area->id,'method' => 'PUT'])
	</div>
</div>
@endsection