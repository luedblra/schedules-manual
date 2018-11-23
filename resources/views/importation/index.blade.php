@extends('layouts.app')
@section('css')
@parent

@endsection
@section('js-superior')
@parent

@endsection
@section('title', 'Importation')
@section('cabecera')

<div class="col-sm-6">
   <h1 class="m-0 text-dark">Import Schedule</h1>
</div><!-- /.col -->
<div class="col-sm-6">
   <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="/home">Home</a></li>
      <li class="breadcrumb-item active">Importation</li>
   </ol>
</div>


<div class="col-lg-12">
   @if (count($errors) > 0)
   <div id="notificationError" class="alert alert-danger">
      <strong>Ocurrió un problema con tus datos de entrada</strong><br>
      <ul>
         @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
         @endforeach
      </ul>
   </div>
   @endif
    @if(Session::has('message.nivel'))

    <div class="alert alert-{{ session('message.nivel') }} alert-dismissible" role="alert">
        <div class="m-alert__icon">
            <i class="fa fa-{{ session('message.icon') }}"></i>
        </div>
        <div class="m-alert__text">
            <strong>
                {{ session('message.title') }}
            </strong>
            {{ session('message.content') }}
        </div>
        <div class="m-alert__close">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        </div>
    </div>
    @endif
</div>
@endsection
@section('content')
<div class="row">
   <div class="col-lg-12">
      <div class="card card-default color-palette-box">

         <div class="card-header">
            <h3 class="card-title">
               <i class="fa fa-file-upload"></i>
               Manage Importation
            </h3>
         </div>

         <div class="card-body">

            {!! Form::open(['route'=>'upload.schedules','method'=>'PUT','files'=>true])!!}
            <div class="form-group row">
               <div class="col-lg-1"></div>
               <div class="col-lg-3">
                  {!! Form::label('namelb','Name',['class' => 'form-label'])!!}
                  {!! Form::text('name','',['class' => 'form-control','required'])!!}
               </div>
               
               <div class="col-lg-3">
                  {!! Form::label('datelb','Date',['class' => 'form-label'])!!}
                  {!! Form::date('date',\Carbon\Carbon::now(),['class' => 'form-control','required'])!!}
               </div>
            </div>
            <div class="form-group row justify-content-center">
               <div class="col-lg-10">
                  <label for="exampleInputFile">File input</label>
                  <div class="input-group mb-3">
                     <div class="input-group-prepend">
                        <span class="input-group-text">Upload</span>
                     </div>
                     <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file" id="inputGroupFile01">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                     </div>
                  </div>

               </div>
            </div>
            <br />
            <div class="form-group row  justify-content-center">
               <div class="col-lg-2">
                  <div class="input-group">
                     <input type="submit" class="btn btn-block btn-outline-primary" value="Load"/>
                  </div>
               </div>
            </div>
            {!! Form::close()!!}
         </div>
      </div>
   </div>
</div>
@section('js-inferior')
@parent
<script type="application/javascript">
   $('input[type="file"]').change(function(e){
      var fileName = e.target.files[0].name;
      $('.custom-file-label').html(fileName);
   });
</script>
@endsection
@stop