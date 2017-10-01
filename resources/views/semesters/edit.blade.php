@extends("layouts.app")

@section("content")
<div class="panel panel-default">
		<div class="panel-heading">Editar semestre</div>
        <div class="panel-body">
			@include('semesters.form',['semestre'=>$semestre, 'url' => '/semestres/'.$semestre->id,'method' => 'PUT'])
		</div>
</div>
@endsection