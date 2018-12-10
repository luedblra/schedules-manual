@extends('layouts.app')
@section('css')
@parent
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
@endsection
@section('js-superior')
@parent

@endsection
@section('title', 'Schedules')
@section('cabecera')

<div class="col-sm-6">
   <h1 class="m-0 text-dark">List Of Schedules For Account</h1>
</div><!-- /.col -->
<div class="col-sm-6">
   <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="/home">Home</a></li>
      <li class="breadcrumb-item active">Schedules</li>
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
               Manage Schedules
            </h3>
         </div>

         <div class="card-body">
            <div class="col-12">

               <ul class="nav nav-tabs">
                  <li class="nav-item">
                     <a class="nav-link active " data-toggle="tab" href="#goodschedules">Good Schedules</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link " data-toggle="tab" href="#failedschedules">Failed Schedules</a>
                  </li>

               </ul>
               <div class="tab-content">
                  <div class="tab-pane active container" id="goodschedules" >
                     <br />
                     <table class="table table-condensed" id="goodschedulestabla" width="100%">
                        <thead >
                           <tr>
                              <th >ID</th>
                              <th >Origin</th>
                              <th >Destination</th>
                              <th >Carrier</th>
                              <th >Vessel</th>
                              <th >Voyage</th>
                              <th >Route Type</th>
                              <th >Via</th>
                              <th >Etd</th>
                              <th >Eta</th>
                              <th >Transit Time</th>
                              <th >Options</th>
                           </tr>
                        </thead>
                     </table>    
                  </div>
                  <div class="tab-pane  container" id="failedschedules">
                     <br />
                     <div class="col-lg-2">
                        <a href="{{route('schedule.edit',$id)}}" class="btn btn-block btn-outline-primary ">Reprocess &nbsp;&nbsp;<span class="fa fa-sync"></span></a>
                     </div>

                     <table class="table table-condensed" id="failedschedulestabla" width="100%">
                        <thead>
                           <tr>
                              <th>ID</th>
                              <th>Origin</th>
                              <th>Destination</th>
                              <th>Carrier</th>
                              <th>Vessel</th>
                              <th>Voyage</th>
                              <th>Route Type</th>
                              <th>Via</th>
                              <th>Etd</th>
                              <th>Eta</th>
                              <th>Transit Time</th>
                              <th>Options</th>
                           </tr>
                        </thead>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="modal fade bd-example-modal-lg" id="update"   role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">
               Schedules
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

   function showModal(selector,id,selectorRet){
      if(selector == 1){
         var url = '{{ route("show.modal.schedules",[":id",":selector",":selectorRet"]) }}';
         url = url.replace(':id',id);
         url = url.replace(':selector',selector);
         url = url.replace(':selectorRet',selectorRet);
         $('#modal-body').load(url,function(){
            $('#update').modal();
         });
      } else if(selector == 2){
         var url = '{{ route("show.modal.schedules",[":id",":selector",":selectorRet"]) }}';
         url = url.replace(':id',id);
         url = url.replace(':selector',selector);
         url = url.replace(':selectorRet',selectorRet);
         $('#modal-body').load(url,function(){
            $('#update').modal();
         });
      }
   }

   $(function() {
      $('#goodschedulestabla').DataTable({
         processing: true,
         ajax: "{!! route('good.failed.schedules',[$id,'1']) !!}",
         columns: [
            { data: 'id', name: 'id' },
            { data: 'origin', name: 'origin_portLb' },
            { data: 'destination', name: 'destination' },
            { data: 'carrier_id', name: "carrier_id" },
            { data: 'vessel', name: 'vessel' },
            { data: 'voyage', name: "voyage" },
            { data: 'route_type', name: 'route_type' },
            { data: 'via', name: 'via' },
            { data: 'etd', name: 'etd' },
            { data: 'eta', name: 'eta' },
            { data: 'transit_time', name: 'transit_time' },
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
         "scrollX": true
      });

      $('#failedschedulestabla').DataTable({
         processing: true,
         //serverSide: true,
         ajax: "{!! route('good.failed.schedules',[$id,'2']) !!}",
         columns: [
            { data: 'id', name: 'id' },
            { data: 'origin', name: 'origin' },
            { data: 'destination', name: 'destination' },
            { data: 'carrier', name: "carrier" },
            { data: 'vessel', name: 'vessel' },
            { data: 'voyage', name: "voyage" },
            { data: 'route_type', name: 'route_type' },
            { data: 'via', name: 'via' },
            { data: 'etd', name: 'etd' },
            { data: 'eta', name: 'eta' },
            { data: 'transit_time', name: 'transit_time' },
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
         //"scrollX": true
      }); 
   });

   $(document).on('click','.delete-schedule', function(e){
      var elemento = $(this);
      var id = $(elemento).attr('data-id-schedule'); 
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

            url='{!! route("schedule.delete",[":id",1]) !!}';
            url = url.replace(':id',id);
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

   $(document).on('click','.delete-failedschedule', function(e){
      var elemento = $(this);
      var id = $(elemento).attr('data-id-failedschedule'); 
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

            url='{!! route("schedule.delete",[":id",2]) !!}';
            url = url.replace(':id',id);
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