{{ Form::open(array('url' => '/user/files/create' , 'id'=>'upload_form')) }}

<div class="col-md-12">
  <div class="collapse" id="collapseAdvanced">
    <div class="card card-body">
      <div class="advanced-div" id="advanced-div" style="">
        <!-- display: none; overflow: hidden; -->
        <div class="row">
          <div class="col-sm-3">
            <div class="form-group">
              {!!  Form::label('password', 'Add password');   !!}

              {{Form::password('password',
              ['class' => "form-control input-sm 
              $errors->has('password') ? ' has-error' : '' ",
              'id'=>'password'])  }}
              @if ($errors->has('password'))
              <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group">
              {!!  Form::label('folder_id', 'Folder Name');   !!}

              {{Form::select('folder_id', $folders ,$selectedfolder, ['class' => "form-control input-sm 
              $errors->has('folder_id') ? ' has-error' : '' "
              ,'id'=>'folder_id'])  }}
              @if ($errors->has('folder_id'))
              <span class="help-block">
                <strong>{{ $errors->first('folder_id') }}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group">             
              <label for="domains">domains</label>

              {{Form::select('domain_id', $domains ,$selectedDomain, ['class' => "form-control input-sm 
              $errors->has('domain_id') ? ' has-error' : '' ",'id'=>'domain_id'])  }}
              @if ($errors->has('domain_id'))
              <span class="help-block">
                <strong>{{ $errors->first('domain_id') }}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group">
              <label for="ad-type">Advertising Type</label>

              {{Form::select('ad_id', $ads ,$selectedAds, 
              ['class' =>"form-control input-sm
              $errors->has('ad_id') ? ' has-error' : '' ",'id'=>'ad_id'])  }}
              @if ($errors->has('ad_id'))
              <span class="help-block">
                <strong>{{ $errors->first('ad_id') }}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="col-sm-3">
            <div class="well well-sm">
              {{Form::text('title','', ['class' =>
              "form-control input-sm $errors->has('title') ? ' has-error' : '' ",
              'id'=>'title','placeholder'=>'Add Title'])  }}
              @if ($errors->has('title'))
              <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="col-sm-3">
            <div class="well well-sm">
              {!!  Form::checkbox('isPrivate','1');    !!}
              {!!  Form::label('isPrivate', 'make as private',
              ['class'=>'','style'=>'font-size:15px;']); !!}
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
    <div class="form-group">

      {!! Form::file('path',
      ['id'=>'path','value'=>'Upload', 'class' => 
      "form-control $errors->has('path') ? ' has-error' : '' ",]);  
      !!}
      @if ($errors->has('path'))
      <span class="help-block">
        <strong>{{ $errors->first('path') }}</strong>
      </span>
      @endif
    </div>
    <div class="form-group">
      <!-- {!!  Form::label('description', 'description');   !!} -->
      {!! Form::textarea('description','',
      ['id'=>'path','placeholder'=>'Insert define to your file','class' => "form-control $errors->has('description') ? ' has-error' : '' ",'required' => 'required',]);  
      !!}
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
      {!! Form::submit('Upload',['class' => 'btn btn-lg btn-success'])   !!}
    </center>

  </footer>
</div>
{!! Form::close() !!}

<div class="upload add-file-result"></div>
