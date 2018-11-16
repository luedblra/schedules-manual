@extends('layouts.app')
@section('css')
@parent

@endsection
@section('js-superior')
@parent

@endsection
@section('title', 'Guia')
@section('cabecera')

<div class="col-sm-6">
   <h1 class="m-0 text-dark">Título Inicial</h1>
</div><!-- /.col -->
<div class="col-sm-6">
   <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Ruta 1</a></li>
      <li class="breadcrumb-item active">localidad</li>
   </ol>
</div>
@endsection
@section('content')
<div class="row">
   <h1>Prueba de funcionalidad</h1>
</div>
@section('js-inferior')
@parent

@endsection
@stop