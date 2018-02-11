    {{ Form::open(array('route' => 'users.store' ,'method'  => 'POST', 'id'=>'Create_form')) }}


    <div class="col-md-8">
    <div class="col-md-6">
    <div class="form-group {{$errors->has('name') ? ' has-error' : ''}}">
    {{  Form::label('name', 'Add name')   }}

    {{Form::text('name','',
    ['class' => "form-control input-sm ",
    'id'=>'name','placeholder'=>'Add name']])  }}

    @if ($errors->has('name'))
    <span class="help-block">
    <strong>{{ $errors->first('name') }}</strong>
    </span>
    @endif
    </div>
    </div>


    <div class="col-md-6">
    {{  Form::label('slug', 'Add Slug')   }}
    <div class="form-group {{$errors->has('slug') ? ' has-error' : ''}}">
    {{   Form::text('slug','', ['class' =>"form-control input-sm ",
    'id'=>'slug','placeholder'=>'Add slug']) 
    }}
    @if ($errors->has('slug'))
    <span class="help-block">
    <strong>{{ $errors->first('slug') }}</strong>
    </span>
    @endif
    </div>
    </div>

    <div class="col-md-8">
    {{  Form::label('url', 'Add url')   }}
    <div class="form-group {{$errors->has('url') ? ' has-error' : ''}}">
    <!-- {{  Form::label('url', 'url')   }} -->
    {{ Form::text('url','',
    ['id'=>'path','placeholder'=>'Insert user Url ','class' => "form-control ",'required' => 'required',])  
    }}
    @if ($errors->has('url'))
    <span class="help-block">
    <strong>{{ $errors->first('url') }}</strong>
    </span>
    @endif
    </div>
    </div>
    </div>


    <div style="clear:both">
    <hr><br>
    </div>
    <footer class="panel-footer">
    <center>
    {{ Form::submit('Create',['class' => 'btn btn-lg btn-success'])   }}
    </center>

    </footer>
    </div>
    {{ Form::close() }}

    <div class="upload add-file-result"></div>
