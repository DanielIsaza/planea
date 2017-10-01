@extends("layouts.app")

@section("content")
<div class="panel panel-default">
	<div class="panel-heading">Tabla resumen</div>
    <div class="panel-body">
    	<div class="row">
            <div class="col-md-3">{!! Field::select('university_id',$universidades) !!}</div>
            <div class="col-md-3">{!! Field::select('faculty_id') !!}</div>
            <div class="col-md-3">{!! Field::select('academicprogram_id') !!}</div>
            <div class="col-md-3">{!! Field::select('academicplan_id') !!}</div>
        </div>

  	  	<table class="table table-hover table-striped table-bordered">
            <thead>
                <tr>
                    <td colspan="2" rowspan="2"></td>
                    @foreach ($h as $hk)
                        <td colspan="{{ sizeof($hk->objective) }}">{{ $hk->nombre }}</td>
                    @endforeach
                </tr>
                <tr>
                    @foreach ($h as $hk)
                        @foreach ($hk->objective as $o)
                            <td>{{ $o->nombre }}</td>
                        @endforeach
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($ac as $ack)
                    <tr>
                        <td rowspan="{{ sizeof($ack->academicspace) }}">{{ $ack->nombre }}</td>
                    @foreach ($ack->academicspace as $ea)
                            <td>{{ $ea->nombre }}</td>
                           @foreach ($ea->lista as $p)
                                <td>{{ $p->valor }}</td>
                            @endforeach
                        </tr>
                        <tr>
                    @endforeach
                @endforeach
                </tr>
            </tbody>
        </table>

    </div>
</div>
@endsection