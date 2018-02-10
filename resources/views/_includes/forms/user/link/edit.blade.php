{!! Form::open(array ('route' => 'links.store',
     'method'  => 'POST', 'id'=>'shorten_form' ,'files'  => true)) !!}
<div class="col-md-12">
  <div class="collapse" id="collapseAdvanced">
    <div class="card card-body">
      <div class="advanced-div" id="advanced-div" style="">
        <!-- display: none; overflow: hidden; -->
        {!! Form::hidden('alias', $link->alias)!!}
        {!! Form::hidden('user_id', $link->user_id)!!}
        <div class="row">
          
          <div class="col-sm-4">
            <div class="form-group {{$errors->has('folder_id') ? 'has-error':''}}">
              {!!  Form::label('folder_id', 'Folder Name');   !!}

              {{Form::select('folder_id', $folders ,$link->folder_id, ['class' => "form-control input-sm  "
              ,'id'=>'folder_id'])  }}
              @if ($errors->has('folder_id'))
              <span class="help-block">
                <strong>{{ $errors->first('folder_id') }}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group {{$errors->has('domain_id') ? 'has-error':''}}">             
              <label for="domains">domains</label>

              {{Form::select('domain_id', $domains ,$link->domain_id, ['class' => "form-control input-sm ",'id'=>'domain_id'])  }}
              @if ($errors->has('domain_id'))
              <span class="help-block">
                <strong>{{ $errors->first('domain_id') }}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group {{$errors->has('ad_id') ? 'has-error':''}}">
              <label for="ad_id">Advertising Type</label>

              {{Form::select('ad_id', $ads ,$link->ad_id, 
              ['class' =>"form-control input-sm ",'id'=>'ad_id'])  }}
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
    <div class="form-group {{$errors->has('url') ? 'has-error':'' }}">
    <div class="col-md-8">
    {!!  Form::label('url','Edit url')   !!}
    {!! Form::text('url',$link->url,
        ['placeholder' =>'Insert Your URL Here',
        'required'=>'required','id'=>'url',
        'class' =>"form-control "
        ]);  
        !!}
       @if ($errors->has('url'))
      <span class="help-block">
        <strong>{{ $errors->first('url') }}</strong>
      </span>
      @endif
     </div>
     <div class="col-md-8">
     {!!  Form::label('slug','Edit Alias')   !!}
    {!! Form::text('slug',$link->slug,
        ['placeholder' =>'Insert Alias', 'required'=>'required',
        'id'=>'slug','class' =>"form-control " ]);  
        !!}
       @if ($errors->has('shorted_url'))
      <span class="help-block">
        <strong>{{ $errors->first('shorted_url') }}</strong>
      </span>
      @endif
     </div>
      <span class="col-md-2">
        {!! Form::submit('update',['class' => 'btn btn-md btn-info '])   !!}
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
