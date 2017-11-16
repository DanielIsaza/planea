@extends('layouts.app')

@section('content')
<div class="panel panel-default">
  <div class="panel-heading">Subir archivos</div>
    <div class="panel-body">
      @permission('archivos.upload')
      {!!Form::open(['url'=> '/subir/','method' => 'POST','enctype'=>"multipart/form-data"]) !!}
        <div class="form-group">
          <label class="col-md-4 control-label">Seleccione el archivo a subir</label>
          <div class="col-md-6">
            <input type="file"  name="file">
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-5" style="text-align:right;">
            <br>
               <button type="submit" class="btn btn-success">Subir</button>
          </div>
        </div>
      {!! Form::close() !!}
      @endpermission
    </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading">Contenido pantalla principal</div>
    <div class="panel-body">
      @permission('mensaje.update')
      {!!Form::open(['url'=> '/phome/','method' => 'POST']) !!}
        <div class="form-group">
          {{ Form::label('Contenido')}}
          {{ Form::textarea('contenido',$contenido,['class' => 'form-control',
            'placeholder'=>'Contenido que aparece en la pantalla principal']) }}
        </div>
        <div class="form-group">
          <div class="col-md-12" style="text-align:right;">
            <br>
               <button type="submit" class="btn btn-success">Guardar</button>
          </div>
        </div>
      {!! Form::close() !!}
      @endpermission
    </div>
</div>
@endsection