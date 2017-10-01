@extends("layouts.app")

@section("content")
<div class="panel panel-default">
	<div class="panel-heading">Crear facultad</div>
    <div class="panel-body">
		@include('faculties.form',[['facultad'=>$facultad, 'universidades'=>$universidades],'url' => '/facultades','method'=>'POST'])
    </div>
</div>
@endsection