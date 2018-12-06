<link rel="stylesheet" href="/AdminLTE/plugins/select2/select2.min.css">
<link rel="stylesheet" href="/css/select2.css">
{!! Form::open(['route' => ['schedule.update',$schedule['id']],'method' => 'PUT']) !!}
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
         {!! Form::select('origin',$harbors,$schedule['origin'],['id' => 'originid', 'class' => 'form-control select2','required'])!!}
      </div>
   </div>
   <div class="col-lg-4">
      <label for="destinationid" class="form-control-label">
         Destination:
      </label>
      <div class="form-group">
         {!! Form::select('destination',$harbors,$schedule['destination'],['id' => 'destinationid', 'class' => 'select2 form-control','required'])!!}
      </div>
   </div>
   <div class="col-lg-4">
      <label for="carrierid" class="form-control-label">
         Carrier:
      </label>
      <div class="form-group">
         {!! Form::select('carrier',$carriers,$schedule['carrier_id'],['id' => 'carrierid', 'class' => 'select2 form-control','required'])!!}
      </div>
   </div>
</div>
<div class="form-group row">
   <div class="col-lg-4" >
      <label for="vesselid" class="form-control-label" >
         Vessel:
      </label>
      <input type="text" name="vessel" required value="{{$schedule['vessel']}}" class="form-control" id="vesselid">
   </div>
   <div class="col-lg-4" >
      <label for="voyageid" class="form-control-label">
         Voyage:
      </label>
      <input type="text" name="voyage" value="{{$schedule['voyage']}}" class="form-control" id="voyageid">
   </div>
   <div class="col-lg-4" >
      <label for="routetypeid" class="form-control-label" >
         Route Type:
      </label>
      <div class="form-group">
         {!! Form::select('routetype',$routetypes,$schedule['route_type'],['id' => 'routetypeid', 'class' => 'select2 form-control','required'])!!}
      </div>
   </div>
</div>
<div class="form-group row">
   <div class="col-lg-4" >
      <label for="voyageid" class="form-control-label">
         Via:
      </label>
      <input type="text" name="via"  value="{{$schedule['via']}}" class="form-control" id="voyageid">
   </div>
   <div class="col-lg-4" >
      <label for="etdid" class="form-control-label">
         Etd:
      </label>
       {!! Form::date('etd',$schedule['etd'],['class' => 'form-control','required'])!!}
   </div>
   <div class="col-lg-4" >
      <label for="etaid" class="form-control-label" >
         Eta:
      </label>
       {!! Form::date('eta',$schedule['eta'],['class' => 'form-control','required'])!!}
   </div>
</div>
<div class="form-group row">
   <div class="col-lg-4" >
      <label for="transittimeid" class="form-control-label">
         Transit Time:
      </label>
      <input type="text" name="transittime"  value="{{$schedule['transit_time']}}" class="form-control" id="transittimeid">
   </div>
</div>
      <input type="hidden" name="account_id"  value="{{$schedule['account_schedules_id']}}" class="form-control" id="accountidid">
      <input type="hidden" name="selector"  value="1" class="form-control" id="selectorid">
      <input type="hidden" name="selectorRet"  value="{{$selectorRet}}" class="form-control" id="selectorid">

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