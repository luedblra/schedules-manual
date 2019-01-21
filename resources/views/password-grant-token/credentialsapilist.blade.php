@extends('layouts.app')
@section('css')
@parent
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
@endsection
@section('js-superior')
@parent

@endsection
@section('title', 'Password Token')
@section('cabecera')

<div class="col-sm-6">
   <h1 class="m-0 text-dark">Credential Api</h1>
</div><!-- /.col -->
<div class="col-sm-6">
   <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="/home">Home</a></li>
      <li class="breadcrumb-item active">Credential Api</li>
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
               Manage Key - Password Api
            </h3>
         </div>

         <div class="card-body">

            <div class="form-group row">

            </div>

            <table class="table table-condensed" id="passwordtable" width="100%">
               <thead  width="100%">
                  <tr>
                     <th>Id</th>
                     <th>Auth Post</th>
                     <th>Client Id</th>
                     <th>Client Secret</th>
                     <th>Email</th>
                     <th>Url</th>
                     <th>Carrier</th>
                     <th>Description</th>
                     <th>Accion</th>
                  </tr>
               </thead>
            </table>    
         </div>
      </div>
   </div>
</div>

<div class="modal fade bd-example-modal-lg" id="update"   role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">
               Credential Api
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">
                  &times;
               </span>
            </button>
         </div>
         <div id="modal-body" class="modal-body">

         </div>
      </div>
   </div>
</div>

@section('js-inferior')
@parent
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script>

   $(function() {
      $('#passwordtable').DataTable({
         processing: true,
         ajax: '{!! route("datatable.credential.api") !!}',
         columns: [
            { data: 'id', name: 'id' },
            { data: 'auth_post', name: 'auth_post' },
            { data: 'client_id', name: "client_id" },
            { data: 'client_secret', name: "client_secret" },
            { data: 'user_name', name: "user_name" },
            { data: 'url', name: "url" },
            { data: 'carrier_id', name: "carrier_id" },
            { data: 'description', name: "description" },
            { data: 'action', name: 'action', orderable: false, searchable: false },
         ],
         "lengthChange": false,
         "searching": true,
         "ordering": true,
         "info": true,
         "deferLoading": 57,
         "autoWidth": true,
         "processing": true,
         "dom": 'Bfrtip',
         "paging": true,
         "scrollX": true,
      });

   });


   
      function showModal(id){
      // alert('funciona');

      url = "{{route('passwordGT.edit',':id')}}"
      url = url.replace(':id',id);
      $('#modal-body').load(url,function(){
         $('#update').modal('show');
      });

   }


</script>
@endsection
@stop