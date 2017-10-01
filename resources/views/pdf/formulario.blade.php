@extends('layouts.app')

@section('content')

<div class="container">

<div class="row">
 <div class="col-md-10 col-md-offset-1">
   <div class="panel panel-default">
     <div class="panel-heading">Subir archivos</div>
       <div class="panel-body">
         <form method="POST" action="subir" accept-charset="UTF-8" enctype="multipart/form-data">
           
           <input type="hidden" name="_token" value="{{ csrf_token() }}">

           <div class="form-group">
             <label class="col-md-4 control-label">Seleccione el archivo</label>
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
         </form>
        </div>
     </div>
   </div>
 </div>
</div>

@endsection
