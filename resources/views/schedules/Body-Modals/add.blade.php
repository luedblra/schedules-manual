<link rel="stylesheet" href="/AdminLTE/plugins/select2/select2.min.css">
<link rel="stylesheet" href="/css/select2.css">
{!! Form::open(['route' => 'schedule.store','method' => 'POST']) !!}
<style>
   .select2 select2-container select2-container--default {
      width: 100%;
   }
</style>
<div class="form-group row">
   <div class="col-lg-4">
      <label for="originid" class="form-control-label">
         Origin:
      </label>
      <div class="form-group" >
         {!! Form::select('origin',$harbors,null,['id' => 'originid', 'class' => 'form-control select2'])!!}
      </div>
   </div>
   <div class="col-lg-4">
      <label for="destinationid" class="form-control-label">
         Destination:
      </label>
      <div class="form-group">
         {!! Form::select('destination',$harbors,null,['id' => 'destinationid', 'class' => 'select2 form-control','required'])!!}
      </div>
   </div>
   <div class="col-lg-4">
      <label for="carrierid" class="form-control-label">
         Carrier:
      </label>
      <div class="form-group">
         {!! Form::select('carrier',$carriers,null,['id' => 'carrierid', 'class' => 'select2 form-control','required'])!!}
      </div>
   </div>
</div>
<div class="form-group row">
   <div class="col-lg-4" >
      <label for="vesselid" class="form-control-label" >
         Vessel:
      </label>
      <input type="text" name="vessel"  value="" class="form-control" required id="vesselid">
   </div>
   <div class="col-lg-4" >
      <label for="voyageid" class="form-control-label">
         Voyage:
      </label>
      <input type="text" name="voyage" value="" class="form-control" id="voyageid">
   </div>
   <div class="col-lg-4" >
      <label for="routetypeid" class="form-control-label" >
         Route Type:
      </label>
      <div class="form-group">
         {!! Form::select('routetype',$routetypes,null,['id' => 'routetypeid', 'class' => 'select2 form-control','required'])!!}
      </div>
   </div>
</div>
<div class="form-group row">
   <div class="col-lg-4" >
      <label for="voyageid" class="form-control-label">
         Via:
      </label>
      <input type="text" name="via"  value="" class="form-control" id="voyageid">
   </div>
   <div class="col-lg-4" >
      <label for="etdid" class="form-control-label">
         Etd:
      </label>
      {!! Form::date('etd',\Carbon\Carbon::now(),['class' => 'form-control','required'])!!}
   </div>
   <div class="col-lg-4" >
      <label for="etaid" class="form-control-label" >
         Eta:
      </label>
      {!! Form::date('eta',\Carbon\Carbon::now(),['class' => 'form-control','required'])!!}
   </div>
</div>
<div class="form-group row">
   <div class="col-lg-4" >
      <label for="transittimeid" class="form-control-label">
         Transit Time:
      </label>
      <input type="text" name="transittime"  value="" class="form-control"  required id="transittimeid">
   </div>
</div>
<input type="hidden" name="account_id"  value="1" class="form-control" id="accountidid">
<hr>
<div class="form-group pull-right" >
   <button type="submit" class="btn btn-primary">
      Update
   </button>
   <button type="button" class="btn btn-secondary" data-dismiss="modal">
      Cancel
   </button>
</div>
{!! Form::close() !!}
<script src="/AdminLTE/plugins/select2/select2.full.js"></script>
<script>
   $('.select2').select2({
      placeholder: "Select an option"
   });

</script>