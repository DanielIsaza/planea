<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Syllabus</title>
    <style>
    @page { margin: 180px 50px; }
    #header { position: fixed; left: 0px; top: -180px; right: 0px; height: 150px; background-color: orange; text-align: center; }
    #footer { position: fixed; left: 0px; bottom: -180px; right: 0px; height: 150px; background-color: lightblue; }
    #footer .page:after { content: counter(page, upper-roman); }
  </style>
  </head>
  <body>
    <div id="header">
      <h1>Widgets Express</h1>
    </div>
    <h1>syllabus</h1>
    {{ $espacio->nombre }}
    <br>
    {{ $espacio->academicplan->academicprogram->nombre }}
    <br>
    {{ $espacio->academicplan->academicprogram->faculty->nombre }}
    <br>
    {{ $espacio->academicplan->academicprogram->nombre }}
    {{ $espacio->nombre }}
    <br>
    Descripcion:
    {{ $espacio->descripcion}}
    <br>
    Justificación:
    {{ $espacio->justificacion }}
    <br>
    Competencias propias del espacio académico, núcleo o cátedra
    {{ $espacio->nucleo }}
    <br>
    	Administración del espacio académico
      Espacio académico: {{ $espacio->nombre }}
      Horas semanales: {{ $espacio->horasTeoricas }}
      Título de horas por semestre: {{ $espacio->horasTeoricas }}
      Metodología: {{ $espacio->metodologia }}
  <br>
  Procesos integrativos:
  {{ $espacio->procesointegrativo }}

    <div id="footer">
      <h1>Widgets Express</h1>
    </div>
  </body>
</html>
