@extends("layouts.app")

@section("content")
<div class="panel panel-default">
    <div class="panel-heading">Estadística por plan de estudios</div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-3">{!! Field::select('university_id',$universidades) !!}</div>
            <div class="col-md-3">{!! Field::select('faculty_id') !!}</div>
            <div class="col-md-3">{!! Field::select('academicprogram_id') !!}</div>
            <div class="col-md-3">{!! Field::select('academicplan_id') !!}</div>
        </div>

    	<div id="grafica"></div>
    </div>
</div>
@endsection

@section("tabla")
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>

<script type="text/javascript">

    $.fn.graficar = function (values,valuesT) {

        var habilidades = [], pesos = [];
        var habilidadesT = [], pesosT = [];

        $.each(values, function (id, values) {
            habilidades.push(values.nombre);
            pesos.push(parseInt(values.peso));
        });

        $.each(valuesT, function (id, values) {
            habilidadesT.push(values.nombre);
            pesosT.push(parseInt(values.peso));
        });

        $(this).highcharts({
            title: { text: 'Programa académico: '+ $('#academicprogram_id option:selected').text() + ' Plan académico: '+ $('#academicplan_id option:selected').text() },
            //Se define el valor de los datos que van en el eje X
            xAxis: { categories: habilidades },
            //Se define el rotulo de los datos que van en el eje y
            yAxis: { title: { text: 'Pesos' } },
            legend: { layout: 'vertical',align:'right' },
            //En esta parte se pone el nombre y los valores correspondientes a las categorias definidas
            series: [
                {type:'column', name: 'Real', data: pesos},
                {type:'column', name: 'Esperado', data: pesosT},
            ]
        });
    }

    $('#academicplan_id').change(function(){
        var plan = $(this).val();
        if( plan > 0){
            $.getJSON('{{ route('estadisticah') }}/'+plan+'/0',null,function(valuesT){
                $.getJSON('{{ route('estadisticah') }}/'+plan+'/1',null,function(values){
                    $('#grafica').graficar(values,valuesT);
                });
            });
        }
    });
</script>
@endsection