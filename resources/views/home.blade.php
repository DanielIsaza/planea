@extends('adminlte::page')

@section('title', 'CIDBA')

@section('content_header')
    <h1>CIDBA</h1>
@stop

@section('content')
	<p> Hola! <?php print_r(Auth::user()->name); ?> está es la introducción del software</p>
@stop