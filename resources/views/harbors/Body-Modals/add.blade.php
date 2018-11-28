<link rel="stylesheet" href="/AdminLTE/plugins/select2/select2.min.css">
<link rel="stylesheet" href="/css/select2.css">
{!! Form::open(['route' => 'UploadFile.store','method' => 'POST']) !!}
<div class="form-group row">
    <div class="col-lg-4">
        <label for="NameMD" class="form-control-label">
            Name:
        </label>
        <input type="text" name="name" required="required" class="form-control" id="NameMD">
    </div>
    <div class="col-lg-4">
        <label for="CodeMD" class="form-control-label">
            Code:
        </label>
        <input type="text" name="code" required="required" class="form-control" id="CodeMD">
    </div>
    <div class="col-lg-4">
        <label for="DispNamMD" class="form-control-label">
            Display Name:
        </label>
        <input type="text" name="display_name" required="required" class="form-control" id="DispNamMD">
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-4">
        <label for="DispNamMD" class="form-control-label">
            Coordinate:
        </label>
        <input type="text" name="coordinate" class="form-control" id="coordinateMD">
    </div>
    <div class="col-lg-4">
        <label for="countryMD" class="form-control-label">
            Country:
        </label>
        {!! Form::select('country',$country,null,['id' => 'countryMD', 'class' => 'select2 form-control'])!!}
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
    <div class="col-lg-4" >
        <label for="DispNamMD" class="form-control-label">
            Variation:
        </label>
        <input type="text" name="variation[]" class="form-control">
    </div>
</div>
<hr>
<div class="form-group pull-right" >
    <button type="submit" class="btn btn-primary">
        Load
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