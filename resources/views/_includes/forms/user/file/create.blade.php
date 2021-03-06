@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{ Form::open(array('route' => 'file.store' ,'method'  => 'POST', 'id'=>'upload_form','files'=>true)) }}

<div class="col-md-12">
  <div class="collapse" id="collapseAdvanced">
    <div class="card card-body">
      <div class="advanced-div" id="advanced-div" style="">
        <!-- display: none; overflow: hidden; -->
        <div class="row">
          <div class="col-sm-4">
            <div class="form-group {{$errors->has('password') ? ' has-error' : ''}}">
              {{  Form::label('password',  Lang::get('lang.password'))   }}

              {{Form::text('password',old('password'), ['class' => "form-control input-sm ",'id'=>'password'])  }}

              @if ($errors->has('password'))
              <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group {{$errors->has('folder_id') ? ' has-error' : ''}}">
              {{  Form::label('folder_id', Lang::get('lang.folder_name'))   }}

              {{Form::select('folder_id', $folders ,old('folder_id')?:1, ['class' => "form-control input-sm ",'id'=>'folder_id'])  }}
              @if ($errors->has('folder_id'))
              <span class="help-block">
                <strong>{{ $errors->first('folder_id') }}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group {{$errors->has('domain_id') ? ' has-error' : ''}}">             
              <label for="domains">@lang('lang.domain_name') </label>

              {{Form::select('domain_id', $domains ,old('domain_id')?:1, ['class' => "form-control input-sm ",'id'=>'domain_id'])  }}
              @if ($errors->has('domain_id'))
              <span class="help-block">
                <strong>{{ $errors->first('domain_id') }}</strong>
              </span>
              @endif
            </div>
          </div>
   
          <div class="col-sm-4">
            <div class="well well-sm {{$errors->has('title') ? ' has-error' : ''}}">
              {{Form::text('title',old('title'), ['class' => "form-control input-sm ",'id'=>'title','placeholder'=> Lang::get('lang.title')])  }}
              @if ($errors->has('title'))
              <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="col-sm-4">
            <div class="well well-sm {{$errors->has('isPrivate') ? ' has-error' : ''}}">
             
             {{ Form::radio('isPrivate','1',FALSE) }} @lang('lang.private')
             {{ Form::radio('isPrivate','0',TRUE) }} @lang('lang.public')

              @if ($errors->has('isPrivate'))
              <span class="help-block">
                <strong>{{ $errors->first('isPrivate') }}</strong>
              </span>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-8">
    <div class="form-group {{$errors->has('path') ? ' has-error' : ''}}">

      {{ Form::file('path',['id'=>'path','value'=>old('path'), 'class' => "form-control ",])  
      }}
      @if ($errors->has('path'))
      <span class="help-block">
        <strong>{{ $errors->first('path') }}</strong>
      </span>
      @endif
    </div>
    <div class="form-group {{$errors->has('description') ? ' has-error' : ''}}">
      <!-- {{  Form::label('description', 'description')   }} -->
      {{ Form::textarea('description','',
      ['id'=>'path','placeholder'=>'Insert define to your file','class' => "form-control ",'required' => 'required',])  
      }}
      @if ($errors->has('description'))
      <span class="help-block">
        <strong>{{ $errors->first('description') }}</strong>
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

<div class="upload add-file-result"></div>
