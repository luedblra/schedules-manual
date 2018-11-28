<link rel="stylesheet" href="/AdminLTE/plugins/select2/select2.min.css">
<link rel="stylesheet" href="/css/select2.css">
{!! Form::open(['route' => ['UploadFile.update',$harbors->id],'method' => 'PUT']) !!}
<div class="form-group row">
    <div class="col-lg-4">
        <label for="NameMD" class="form-control-label">
            Name:
        </label>
        <input type="text" name="name" value="{{$harbors->name}}" required="required" class="form-control" id="NameMD">
    </div>
    <div class="col-lg-4">
        <label for="CodeMD" class="form-control-label">
            Code:
        </label>
        <input type="text" name="code" value="{{$harbors->code}}" required="required" class="form-control" id="CodeMD">
    </div>
    <div class="col-lg-4">
        <label for="DispNamMD" class="form-control-label">
            Display Name:
        </label>
        <input type="text" name="display_name" value="{{$harbors->display_name}}" required="required" class="form-control" id="DispNamMD">
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-4">
        <label for="DispNamMD" class="form-control-label">
            Coordinate:
        </label>
        <input type="text" name="coordinate" value="{{$harbors->coordinates}}" class="form-control" id="coordinateMD">
    </div>
    <div class="col-lg-4">
        <label for="countryMD" class="form-control-label">
            Country:
        </label>
        {!! Form::select('country',$country,$harbors->country_id,['id' => 'countryMD', 'class' => 'select2 form-control'])!!}
    </div>
    <div class="col-lg-1">
    </div>
    <div class="col-lg-2">
        <br>
        <a href="#" class="btn btn-primary " onclick="agregarcampo()"><span class="fa fa-plus"></span></a>
    </div>

</div>
<hr>
<div class="form-group row" id="variatiogroup">
    @foreach($decodejosn as $nameVaration)

    @if($nameVaration != '')
    <div class="col-lg-4" >
        <label for="DispNamMD" class="form-control-label">
            Variation:
        </label>
        <input type="text" name="variation[]" value="{{$nameVaration}}" class="form-control">
        <a href="#" class="borrarInput"><samp class="fa fa-times"></samp></a>
    </div>
    @endif
    @endforeach
</div>
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
    
    $(document).on('click','.borrarInput',function(e){
       $(this).closest('div').remove();
    });
</script>