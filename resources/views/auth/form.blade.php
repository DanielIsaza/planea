{!!Form::open(['url'=> $url,'method' => $method]) !!}
	<div class="form-group">
		<div>
			{{ Form::label('Nombre') }}
			{{ Form::text('nombre',$usuario->name,['class' => 'form-control',
			'placeholder'=>'Nombre de la persona','required'=>'requerido']) }}
		</div>
		<div>
			{{ Form::label('Correo electrónico') }}
			{{ Form::text('correo',$usuario->email,['class'=> 'form-control','placeholder'=>'Correo electrónico de la persona','required'=>'requerido']) }}
		</div>
		<div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
			{{ Form::label('Contraseña') }}
			<input type="password" name="password" class="form-control" placeholder="{{ trans('adminlte::adminlte.password') }}">
			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
            @if ($errors->has('password'))
            	<span class="help-block">
                	<strong>{{ $errors->first('password') }}</strong>
			    </span>
            @endif
        </div>
        <div>
        	{!! Field::select('rol',$roles,$rol) !!}
        </div>
        <div>
        	{!! Field::select('academicprogram_id[]',$programas,$usuario->academicprogram) !!}
        </div>
	</div>
	<div class="form-group text-	">
		<a href="{{url('/usuarios')}}">Regresar al listado de usuarios</a>
		<input type="submit" value="Guardar" class="btn btn-success">
	</div>
{!! Form::close() !!}