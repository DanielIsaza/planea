@extends('adminlte::page')

@section('imports')

  <link href="/css/app.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">

  <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />

  <link rel="stylesheet" href="{{ asset('/js/chosen/chosen.css') }}">

   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
 
    <!-- Include Editor style. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/css/froala_style.min.css" rel="stylesheet" type="text/css" />


  <!-- Scripts -->
  <script>
      window.Laravel = <?php echo json_encode([
          'csrfToken' => csrf_token(),
      ]); ?>
  </script>

  <style type="text/css">
  div {
      margin-bottom: 1%;
      }
  </style>

@endsection

@section('selects')

  <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
  <script type="text/javascript" src="{{ asset('/js/chosen/chosen.jquery.js') }}"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>
 
  <!-- Include Editor JS files. -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/js/froala_editor.pkgd.min.js"></script>

  <script type="text/javascript">
      $(document).ready(function(){
          $.fn.populateSelect = function (values) {
              var options = '';
              options += '<option value = "'+-1+'"> Seleccione una opción </option>';
              $.each(values, function (key, row) {
                  options += '<option value="' + row.value + '">' + row.text + '</option>';
              });
              $(this).html(options);
          }
          $('#university_id').change(function(){
              $('#academicprogram_id').empty().change();
              $('#tabla > tbody').remove();
              var universidad = $(this).val();
              if(universidad == ''){
                  $('#faculty_id').empty().change();
                  $('#academicprogram_id').empty().change();
              }else{
                if($('#faculty_id').length){
                      $.getJSON('{{ route('facultad/' )}}/'+universidad,null,function(values){
                      $('#faculty_id').populateSelect(values);
                  });
                }else{
                    $.getJSON('{{ route('facultad/' )}}/'+universidad,null,function(values){
                      $('#tabla').populateTable(values);
                  });
                }
              }
          });
          $('#faculty_id').change(function(){
              $('#academicprogram_id').empty().change();
              $('#tabla > tbody').remove();
              var facultad = $(this).val();
              if(facultad == -1){
                  $('#academicprogram_id').empty().change();
              }else{
                    if( $('#academicprogram_id').length ){
                      $.getJSON('{{ route('programa/' )}}/'+facultad,null,function(values){
                          $('#academicprogram_id').populateSelect(values);
                      });
                    }else{
                      $.getJSON('{{ route('programa/' )}}/'+facultad,null,function(values){
                          $('#tabla').populateTable(values);
                      });
                    }
              }
          });
          $('#academicprogram_id').change(function(){
              if($('#academicprogram_id').length){
                  $('#tabla > tbody').remove();
              }
              $('#academicplan_id').empty().change();
              var programa = $(this).val();
              if(programa != null){
              if(programa == -1){
                  $('#tabla > tbody').remove();
              }else{
                  if($('#academicplan_id').length){
                      $.getJSON('{{ route('planes/') }}/'+programa,null,function(values){
                          $('#academicplan_id').populateSelect(values);
                      });
                  }else {
                      $.getJSON('{{ route('planes/') }}/'+programa,null,function(values){
                          $('#tabla').populateTable(values);
                      });
                  }
              }
              }
          });
          $('#academicplan_id').change(function(){
              $('#tabla > tbody').remove();
              var plan = $(this).val();
              if(plan != null){
                  if(plan == -1){
                      $('#tabla > tbody').remove();
                  }
              else{
                  if($("#academicspace_id").length){
                      $.getJSON('{{ route('materia') }}/'+plan,null,function(values){
                          $('#academicspace_id').populateSelect(values);
                      });
                  }
                  if($("#ability_id").length){
                      $.getJSON('{{ route('habilidad') }}/'+plan,null,function(values){
                          $("#ability_id").populateSelect(values);
                      });
                  }
                  if(!$("#semester_id").length && $("#tabla").length && !$("#ability_id").length) {
                      $.getJSON('{{ route('habilidad') }}/'+plan,null,function(values){
                          $('#tabla').populateTable(values);
                      });
                  }
                  if($('#tablak').length){
                      $.getJSON('{{ route('area')}}/'+plan,null,function(values){
                        $('#tablak').populateTable(values);
                      });
                  }
              }
          }
          });
          $('#semester_id').change(function(){
              $('#tabla > tbody').remove();
              var semestre = $("#semester_id").val();
              var plan = $("#academicplan_id").val();
              if( semestre > 0 && plan > 0){
                  $.getJSON('{{ route('materias') }}/'+semestre+'/'+plan,null,function(values){
                      $("#tabla").populateTable(values);
                  });
              }
          });
          $('#typeability_id').change(function(){
              $('#tabla > tbody').remove();
              var tipoHabilidad = $('#typeability_id').val();
              if(tipoHabilidad > 0){
                  $.getJSON('{{route('habilidad')}}/'+tipoHabilidad,null,function(values){
                      $("#ability_id").populateSelect(values);
                  });
              }
          });
          $('#ability_id').change(function(){
              $('#tabla > tbody').remove();
              $('#tablaO > tbody').remove();
              $('#tablaT > tbody').remove();
              var habilidad = $('#ability_id').val();
              if(habilidad > 0){
                  if($('#tablaO').length){
                      $.getJSON('{{ route('objetivosreal') }}/'+habilidad,null,function(values){
                          $('#tablaO').populateTable(values);
                      });
                  }else{
                  if($('#objective_id').length){
                      $.getJSON('{{ route('objetivo/')}}/'+habilidad,null,function(values){
                          $('#objective_id').populateSelect(values);
                      });
                  }else{
                      console.log('{{ route('objetivo/')}}/'+habilidad);
                      $.getJSON('{{ route('objetivo/')}}/'+habilidad,null,function(values){
                          $("#tabla").populateTable(values);
                      });
                  }
                  }
              }
          });
      });
  </script>
@endsection
