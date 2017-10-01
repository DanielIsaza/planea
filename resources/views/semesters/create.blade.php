@extends("layouts.app")

@section("content")
<div class="panel panel-default">
	<div class="panel-heading">Crear semestre</div>
    <div class="panel-body">
		@include('semesters.form',['semestre'=>$semestre,'url' => '/semestres','method'=>'POST'])
	</div>
</div>
@endsection