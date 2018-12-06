{!! Form::open(['url' => '/oauth/clients','method' => 'POST']) !!}
<div class="form-group row">
    <div class="col-lg-6">
        <label for="originid" class="form-control-label">
            Name:
        </label>
        <div class="form-group" >
            {!! Form::text('name',null,['id' => 'nameid', 'class' => 'form-control ','required'])!!}
        </div>
    </div> 
    <div class="col-lg-6">
        <label for="originid" class="form-control-label">
            Redirect:
        </label>
        <div class="form-group" >
            {!! Form::text('redirect','http://localhost',['id' => 'redirectid', 'class' => 'form-control ','required'])!!}
        </div>
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