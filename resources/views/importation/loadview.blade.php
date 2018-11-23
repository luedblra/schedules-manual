@extends('layouts.app')
@section('css')
@parent
<link rel="stylesheet" href="/AdminLTE/plugins/select2/select2.min.css">
<link rel="stylesheet" href="/css/select2.css">
@endsection
@section('js-superior')
@parent

@endsection
@section('title', 'I. Columns')
@section('cabecera')

<div class="col-sm-6">
   <h1 class="m-0 text-dark">Imporation / Load</h1>
</div><!-- /.col -->
<div class="col-sm-6">
   <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="/home">Home</a></li>
      <li class="breadcrumb-item active">Importation</li>
      <li class="breadcrumb-item active">Load</li>
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
      {!! Form::open(['route'=>'importation.store','method'=>'post'])!!}
      <div class="card card-default color-palette-box">

         <div class="card-header">
            <h3 class="card-title">
               <i class="fa fa-tag"></i>
               Rows Importation
            </h3>
         </div>

         <div class="card-body">
            <div class="form-group row">
               <div class="col-lg-1"></div>
               <div class="col-lg-3">
                  {!! Form::label('namelb','Name',['class' => 'form-label'])!!}
                  {!! Form::text('name',$account->name,['class' => 'form-control','readonly'])!!}
               </div>

               <div class="col-lg-3">
                  {!! Form::label('datelb','Date',['class' => 'form-label'])!!}
                  {!! Form::text('date',$account->date,['class' => 'form-control','readonly'])!!}
               </div>
               <div class="col-lg-4">
                  {!! Form::label('filelb','File',['class' => 'form-label'])!!}
                  {!! Form::text('file',$filetmp->namefile,['class' => 'form-control','readonly'])!!}
               </div>
            </div>
            <br />
            <hr />
            <br />

            <div class="form-group row">
               @foreach($targetsArr as $targets)
               <div class="col-md-3">
                  <div class="card card-success card-outline">
                     <div class="card-header">
                        <h3 class="card-title">{{$targets}}</h3>

                        <div class="card-tools">

                        </div>
                        <!-- /.card-tools -->
                     </div>
                     <!-- /.card-header -->
                     <div class="card-body">
                        {!! Form::select($targets,$coordenates,null,['class' => 'select2 form-control ', 'id' => 'select'.$loop->iteration, 'onchange'=>'equals('.$loop->iteration.')'])!!}

                     </div>
                     <!-- /.card-body -->
                  </div>
               </div>
               @endforeach
               <input type="hidden" name="accountid" id="accountid" value="{{$account->id}}" />
               <input type="hidden" name="fileid" id="fileid" value="{{$filetmp->id}}" />
               <input type="hidden" name="countTarges" id="countTarges" value="{{$countTarges}}" />
            </div>
            <div class="form-group m-form__group row">

               <div class="col-lg-5 col-lg-offset-5"> </div>
               <div class="col-lg-2 col-lg-offset-2">
                  <button type="submit" id="processid" class="btn btn-primary form-control">
                     Process
                  </button>
               </div>
            </div>

         </div>

      </div>
      {!! Form::close()!!}
   </div>
</div>

@section('js-inferior')
@parent
<script src="/js/Importation/process-targesrs.js"></script>
<script src="/AdminLTE/plugins/select2/select2.full.js"></script>
<script>
   $('.select2').select2({
      placeholder: "Select an option"
   });
</script>
@endsection
@stop