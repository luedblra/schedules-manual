@extends('layouts.app')
@section('css')
@parent
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
@endsection
@section('title', 'Harbors')
@section('cabecera')

<div class="col-sm-6">
   <h1 class="m-0 text-dark">Harbors</h1>
</div><!-- /.col -->
<div class="col-sm-6">
   <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="/">Home</a></li>
      <li class="breadcrumb-item active">Harbors</li>
   </ol>
</div>
@endsection
@section('content')
<div class="row">
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

      <div class="card card-default color-palette-box">

         <div class="card-header">
            <h3 class="card-title">
               <i class="fa fa-tag"></i>
               Manager Harbors
            </h3>
         </div>

         <div class="card-body">
            <div class="col-lg-2">
               <a href="#" class="btn btn-block btn-primary" onclick="showModal(1,0)" > Add <span class="fa fa-plus"></span></a>
            </div>
            <table class="table table-condensed" id="myatest" width="100%">
               <thead  width="100%">
                  <tr>
                     <th style="width:3%">ID</th>
                     <th style="width:7%">Name</th>
                     <th style="width:7%">Code</th>
                     <th style="width:8%">Display Name</th>
                     <th style="width:10%">coordinates</th>
                     <th style="width:6%">Country ID</th>
                     <th style="width:40%">Variation</th>
                     <th style="width:5%">Options</th>
                  </tr>
               </thead>
            </table>
         </div>

      </div>
   </div>
</div>

<div class="modal fade bd-example-modal-lg" id="addHarborModal"   role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">
               Harbors
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

@endsection

@section('js-inferior')
@parent

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script>

   function agregarcampo(){
      var newtr = '<div class="col-lg-4 ">';
      newtr = newtr + '<label class="form-control-label">Variation:</label>';
      newtr = newtr + '<input type="text" name="variation[]" class="form-control" required="required">';
      newtr = newtr + '<a href="#" class="borrado"><span class="fa fa-times"></span></a>';
      newtr = newtr + '</div>';
      $('#variatiogroup').append(newtr);
   }

   $(document).on('click','.borrado', function(e){
      var elemento = $(this);
      $(elemento).closest('div').remove();
   });

   /* $('.m-select2-general').select2({

    });
*/
   function showModal(selector,id){
      if(selector == 1){
         var url = '{{ route("load.View.Add") }}';
         $('#modal-body').load(url,function(){
            $('#addHarborModal').modal();
         });
      } else if(selector == 2){
         var url = '{{ route("UploadFile.show",":id") }}';
         url = url.replace(':id',id);
         $('#modal-body').load(url,function(){
            $('#addHarborModal').modal();
         });
      }
   }

   $(document).on('click','.BorrarHarbor', function(e){
      var elemento = $(this);
      var id = $(elemento).attr('data-id-remove'); 
      swal({
         title: 'Are you sure?',
         text: "You won't be able to revert this!",
         type: 'warning',
         showCancelButton: true,
         confirmButtonText: 'Yes, delete it!',
         cancelButtonText: 'No, cancel!',
         reverseButtons: true
      }).then(function(result){
         if (result.value) {

            url='{!! route("destroy.harbor",":id") !!}';
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

   $(function() {
      $('#myatest').DataTable({
         processing: true,
         //serverSide: true,
         ajax: '{!! route("UploadFile.create") !!}',
         columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'code', name: 'code' },
            { data: 'display_name', name: 'display_name' },
            { data: 'coordinates', name: 'coordinates' },
            { data: 'country_id', name: "country_id" },
            { data: 'varation', name: "varation" },
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
         "scrollX":true
      });

   });


</script>

@stop
