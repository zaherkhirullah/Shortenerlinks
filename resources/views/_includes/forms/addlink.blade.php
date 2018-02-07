  
   {!! Form::open(array ('route' => 'links.store',
     'method'  => 'POST', 'id'=>'shorten_form' ,'files'  => true)) !!}

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="col-md-12">
  <div class="collapse" id="collapseAdvanced">
    <div class="card card-body">
      <div class="advanced-div" id="advanced-div" style="">
        <!-- display: none; overflow: hidden; -->

        <div class="row">
          <div class="col-sm-3">
            <div class="form-group"> 
              {!!  Form::label('alias','Add alias')   !!}
              {!! Form::text('alias', '',
              ['placeholder' =>'Alias','id'=>'alias',
              'class' => "form-control input-sm $errors->has('alias') ? ' has-error' : '' ",]);  
              !!}
              @if ($errors->has('alias'))
              <span class="help-block">
                <strong>{{ $errors->first('alias') }}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group">
              {!!  Form::label('folder_id', 'Folder Name');   !!}

              {{Form::select('folder_id', $folders ,$selectedfolder, ['class' => "form-control input-sm $errors->has('folder_id') ? ' has-error' : '' "
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
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-10">
    <div class="input-group">
      {!! Form::text('url','',
      ['placeholder' =>'Insert Your URL Here',
      'required'=>'required','id'=>'url',
      'class' =>"form-control $errors->has('ad_id') ? ' has-error' : '' "
      ]);  
      !!}
       @if ($errors->has('url'))
      <span class="help-block">
        <strong>{{ $errors->first('url') }}</strong>
      </span>
      @endif
      <span class="input-group-addon">
        {!! Form::submit('shorten',['class' => 'btn btn-info '])   !!}
      </span>
     
    </div>
  </div>
  <div class="col-md-2" >
    <button type="button" data-toggle="collapse" data-target="#collapseAdvanced" aria-expanded="false" aria-controls="collapseAdvanced" class="btn btn-default btn-md advanced ">
      Advanced <i class="fa fa-plus"></i>
    </button>
  </div>

</div>
{!! Form::close() !!}
<div class="shorten add-link-result"></div>
