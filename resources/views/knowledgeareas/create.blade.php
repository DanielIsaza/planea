@extends("layouts.app")

@section("content")
<div class="panel panel-default">
	<div class="panel-heading">Crear área de conocimiento</div>
    <div class="panel-body">
		@include('knowledgeareas.form',['area'=>$area,'url' => '/areasconocimiento','method'=>'POST'])
	</div>
</div>
@endsection