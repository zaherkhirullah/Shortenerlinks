    {{ Form::open(array('route' =>  ['users.update',$user->id],'method'  => 'POST', 'id'=>'Create_form')) }}
    <div style="display: none;">
	{{ method_field('PUT') }}
	{{ csrf_field() }}
</div>

    <div class="col-md-8">
    <div class="col-md-3">
    <div class="form-group {{$errors->has('first_name') ? ' has-error' : ''}}">
    {{  Form::label('first_name', 'Edit first_name')   }}

    {{Form::text('first_name',$user->first_name,
    ['class' => "form-control input-sm ",
    'id'=>'first_name','placeholder'=>'Edit name'])  }}

    @if ($errors->has('first_name'))
    <span class="help-block">
    <strong>{{ $errors->first('first_name') }}</strong>
    </span>
    @endif
    </div>
    <div class="form-group {{$errors->has('last_name') ? ' has-error' : ''}}">
    {{  Form::label('last_name', 'Edit last_name')   }}

    {{Form::text('last_name',$user->last_name,
    ['class' => "form-control input-sm ",
    'id'=>'last_name','placeholder'=>'Edit last_name'])  }}

    @if ($errors->has('last_name'))
    <span class="help-block">
    <strong>{{ $errors->first('last_name') }}</strong>
    </span>
    @endif
    </div>
    </div>


    <div class="col-md-6">
    {{  Form::label('email', 'Edit email')   }}
    <div class="form-group {{$errors->has('email') ? ' has-error' : ''}}">
    {{   Form::text('email','', ['class' =>"form-control input-sm ",
    'id'=>'email','placeholder'=>'Edit email']) 
    }}
    @if ($errors->has('email'))
    <span class="help-block">
    <strong>{{ $errors->first('email') }}</strong>
    </span>
    @endif
    </div>
    </div>

    <div class="col-md-6">
    {{  Form::label('username', 'Edit username')   }}
    <div class="form-group {{$errors->has('username') ? ' has-error' : ''}}">
    {{   Form::text('username','', ['class' =>"form-control input-sm ",
    'id'=>'username','placeholder'=>'Edit username']) 
    }}
    @if ($errors->has('username'))
    <span class="help-block">
    <strong>{{ $errors->first('username') }}</strong>
    </span>
    @endif
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

    <div class="upload Edit-file-result"></div>
