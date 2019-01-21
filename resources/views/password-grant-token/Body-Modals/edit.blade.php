{!! Form::open(['route' => ['passwordGT.update',$credential->id],'method' => 'put'])!!}

<div class="form-group row">
   <div class="col-6">
      <label for="NameMD" class="form-control-label">
         Auth Post:
      </label>
      {!! Form::text('auth_post',$credential->auth_post,['class' => 'form-control'])!!}
   </div>
   <div class="col-2">
      <label for="NameMD" class="form-control-label">
         Client Id:
      </label>
      {!! Form::number('client_id',$credential->client_id,['class' => 'form-control'])!!}
   </div>
   <div class="col-4">
      <label for="NameMD" class="form-control-label">
         Carrier:
      </label>
      {{ Form::select('carrier_id', $carriers,$credential->carrier_id,['id' => 'ToPort2','class'=>' form-control','required','style' => 'width:100%;']) }}
   </div>
</div>

<div class="form-group row">
   <div class="col-6">
      <label for="NameMD" class="form-control-label">
         User Name:
      </label>
      {!! Form::text('user_name',$credential->user_name,['class' => 'form-control'])!!}
   </div>
   <div class="col-6">
      <label for="NameMD" class="form-control-label">
         Password:
      </label>
      {!! Form::text('password',$credential->password,['class' => 'form-control'])!!}
   </div>
</div>

<div class="form-group row">
   <div class="col-12">
      <label for="NameMD" class="form-control-label">
         Client Secret:
      </label>
      {!! Form::text('client_secret',$credential->client_secret,['class' => 'form-control'])!!}
   </div>
</div>

<div class="form-group row">
   <div class="col-6">
      <label for="NameMD" class="form-control-label">
         Url:
      </label>
      {!! Form::text('url',$credential->url,['class' => 'form-control','required'])!!}
   </div>

   <div class="col-6">
      <label for="NameMD" class="form-control-label">
         Description:
      </label>
      {!! Form::text('description',$credential->description,['class' => 'form-control'])!!}
   </div>
</div>

</div>
<div class="modal-footer">
   <button type="submit" class="btn btn-primary" >Update</button>
   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
{!! Form::close()!!}
