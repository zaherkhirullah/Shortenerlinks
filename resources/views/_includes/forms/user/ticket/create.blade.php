@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{ Form::open(array('route' => 'ticket.store' ,'method'  => 'POST', 'id'=>'upload_form',
'files'=>true)) }}

<div class="col-md-12">
  <div class="collapse" id="collapseAdvanced">
    <div class="card card-body">
      <div class="advanced-div" id="advanced-div" style="">
       
      </div>
    </div>
  </div>

  <div class="col-md-8">


  <div class="form-group {{$errors->has('description') ? ' has-error' : ''}}">
      {{  Form::label('subject', 'Subject')   }}
      {{ Form::text('subject','',
      ['id'=>'path','placeholder'=>'ticket subject','class' => "form-control ",'required' => 'required',])  
      }}
      @if ($errors->has('subject'))
      <span class="help-block">
        <strong>{{ $errors->first('subject') }}</strong>
      </span>
      @endif
    </div>
  <div class="form-group {{$errors->has('message') ? ' has-error' : ''}}">
      {{  Form::label('message', 'message')   }}
      {{ Form::textarea('message','',
      ['id'=>'path','placeholder'=>'Insert your  message ','class' => "form-control ",'required' => 'required',])  
      }}
      @if ($errors->has('message'))
      <span class="help-block">
        <strong>{{ $errors->first('message') }}</strong>
      </span>
      @endif
    </div>

    <div class="form-group {{$errors->has('path') ? ' has-error' : ''}}">
    {{  Form::label('path', 'Add file')   }}

      {{ Form::file('path',['id'=>'path','value'=>old('path'), 'class' => "form-control ",])  
      }}
      @if ($errors->has('path'))
      <span class="help-block">
        <strong>{{ $errors->first('path') }}</strong>
      </span>
      @endif
    </div>
    

  </div>
  <div class="col-md-2 col-md-offset-2">
    <button type="button" data-toggle="collapse" data-target="#collapseAdvanced" aria-expanded="false" aria-controls="collapseAdvanced" class="btn btn-default btn-md advanced ">
      Advanced <i class="fa fa-plus"></i>
    </button>
  </div>

  <div style="clear:both">
    <hr><br>
  </div>
  <footer class="panel-footer">
    <center>
      {{ Form::submit('Upload',['class' => 'btn btn-lg btn-success'])   }}
    </center>

  </footer>
</div>
{{ Form::close() }}

<div class="upload add-ticket-result"></div>
