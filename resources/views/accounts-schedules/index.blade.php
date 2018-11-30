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

            <table class="table table-condensed" id="accounttabla" width="100%">
               <thead  width="100%">
                  <tr>
                     <th>ID</th>
                     <th>Name</th>
                     <th>Date</th>
                     <th style="color:red">Failed</th>
                     <th style="color:green">Good</th>
                     <th style="color:blue">Done</th>
                     <th>User</th>
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
<script>
   $(function() {
      $('#accounttabla').DataTable({
         processing: true,
         ajax: '{!! route("AcountS.create") !!}',
         columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'date', name: 'date' },
            { data: 'countfailedschedule', name: 'countfailedschedule' },
            { data: 'countschedule', name: 'countschedule' },
            { data: 'done', name: 'done' },
            { data: 'user_id', name: 'user_id' },
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
         //"scrollX": true,
      });

   });
   $(document).on('click','.delete-account', function(e){
      var elemento = $(this);
      var id = $(elemento).attr('data-id-account'); 
      swal({
         title: 'Are you sure?',
         text: "You won't be able to revert this! Id: "+id,
         type: 'warning',
         showCancelButton: true,
         confirmButtonText: 'Yes, delete it!',
         cancelButtonText: 'No, cancel!',
         reverseButtons: true
      }).then(function(result){
         if (result.value) {

            url='{!! route("account.delete",":id") !!}';
            url = url.replace(':id', id);
            // $(this).closest('tr').remove();
            $.ajax({
               url:url,
               method:'get',
               success: function(data){
                  if(data == 1){
                     swal(
                        'Deleted!',
                        'Your rate has been deleted.',
                        'success'
                     )
                     $(elemento).closest('tr').remove();

                  }else if(data == 2){
                     swal("Error!", "an internal error occurred!", "error");
                  }
               }
            });
         } else if (result.dismiss === 'cancel') {
            swal(
               'Cancelled',
               'Your rate is safe :)',
               'error'
            )
         }
      });
   });
</script>
@endsection
@stop