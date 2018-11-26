@extends('layouts.app')
@section('css')
@parent
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
@endsection
@section('js-superior')
@parent

@endsection
@section('title', 'Accounts')
@section('cabecera')

<div class="col-sm-6">
   <h1 class="m-0 text-dark">List Of Accounts</h1>
</div><!-- /.col -->
<div class="col-sm-6">
   <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="/home">Home</a></li>
      <li class="breadcrumb-item active">Accounts</li>
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
               <i class="fa fa-tag"></i>
               Manage Accounts
            </h3>
         </div>

         <div class="card-body">

            <table class="table table-condensed" id="goodschedulestabla" width="100%">
               <thead  width="100%">
                  <tr>
                     <th>ID</th>
                     <th>Name</th>
                     <th>Date</th>
                     <th>Options</th>
                  </tr>
               </thead>
            </table>          

         </div>
      </div>
   </div>
</div>
@section('js-inferior')
@parent
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
@endsection
@stop