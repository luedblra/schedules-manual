<link rel="stylesheet" href="/AdminLTE/plugins/select2/select2.min.css">
<link rel="stylesheet" href="/css/select2.css">
{!! Form::open(['route' => ['schedule.update',$data['id']],'method' => 'PUT']) !!}
<style>
   .select2 select2-container select2-container--default {
      width: 100%;
   }
</style>
<div class="form-group row">
   <div class="col-lg-4">
      <label for="originid" class="form-control-label" style="{{$data['originClass']}}">
         Origin:
      </label>
      <div class="form-group" >
         {!! Form::select('origin',$harbors,$data['origin'],['id' => 'originid', 'class' => 'form-control select2','required'])!!}
      </div>
   </div>
   <div class="col-lg-4">
      <label for="destinationid" class="form-control-label" style="{{$data['destinationClass']}}">
         Destination:
      </label>
      <div class="form-group">
         {!! Form::select('destination',$harbors,$data['destination'],['id' => 'destinationid', 'class' => 'select2 form-control','required'])!!}
      </div>
   </div>
   <div class="col-lg-4">
      <label for="carrierid" class="form-control-label" style="{{$data['carrierClass']}}">
         Carrier:
      </label>
      <div class="form-group">
         {!! Form::select('carrier',$carriers,$data['carrier'],['id' => 'carrierid', 'class' => 'select2 form-control','required'])!!}
      </div>
   </div>
</div>
<div class="form-group row">
   <div class="col-lg-4" >
      <label for="vesselid" class="form-control-label" style="{{$data['vesselClass']}}">
         Vessel:
      </label>
      <input type="text" name="vessel" required value="{{$data['vessel']}}" class="form-control" id="vesselid">
   </div>
   <div class="col-lg-4" >
      <label for="voyageid" class="form-control-label" style="{{$data['voyageClass']}}" >
         Voyage:
      </label>
      <input type="text" name="voyage" value="{{$data['voyage']}}" class="form-control" id="voyageid">
   </div>
   <div class="col-lg-4" >
      <label for="routetypeid" class="form-control-label" style="{{$data['routetypeClass']}}">
         Route Type:
      </label>
      <div class="form-group">
         {!! Form::select('routetype',$routetypes,$data['route_type'],['id' => 'routetypeid', 'class' => 'select2 form-control','required'])!!}
      </div>
   </div>
</div>
<div class="form-group row">
   <div class="col-lg-4" >
      <label for="voyageid" class="form-control-label" style="{{$data['viaClass']}}">
         Via:
      </label>
      <input type="text" name="via"  value="{{$data['via']}}" class="form-control" id="voyageid">
   </div>
   <div class="col-lg-4" >
      <label for="etdid" class="form-control-label" style="{{$data['etdClass']}}">
         Etd:
      </label>
      {!! Form::date('etd',$data['etd'],['class' => 'form-control','required'])!!}
   </div>
   <div class="col-lg-4" >
      <label for="etaid" class="form-control-label" style="{{$data['etaClass']}}" >
         Eta:
      </label>
      {!! Form::date('eta',$data['eta'],['class' => 'form-control','required'])!!}
   </div>
</div>
<div class="form-group row">
   <div class="col-lg-4" >
      <label for="transittimeid" class="form-control-label" style="{{$data['transittimeClass']}}">
         Transit Time:
      </label>
      <input type="text" name="transittime"  value="{{$data['transit_time']}}" required class="form-control" id="transittimeid">
   </div>
</div>
<input type="hidden" name="account_id"  value="{{$data['account_id']}}" class="form-control" id="accountidid">
<input type="hidden" name="selector"  value="2" class="form-control" id="selectorid">
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