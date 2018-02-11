    {{ Form::open(array('route' => 'roles.store' ,'method'  => 'POST', 'id'=>'Create_form')) }}
    <div class="col-md-12 panel-body">
    
    <div class="col-md-6">
        <div class="form-group {{$errors->has('name') ? ' has-error' : ''}}">
        {{  Form::label('name', 'Role name')   }}

        {{Form::text('name','',
        ['class' => "form-control input-sm ",
        'id'=>'name','placeholder'=>'Role name *'])  }}

        @if ($errors->has('name'))
        <span class="help-block">
          <strong>{{ $errors->first('name') }}</strong>
        </span>
        @endif
        </div>
    </div>
    <div class="col-md-6">
         {{  Form::label('slug', 'Display Name')   }}
        <div class="form-group {{$errors->has('slug') ? ' has-error' : ''}}">
            {{   Form::text('slug','', ['class' =>"form-control input-sm ",
                            'id'=>'slug','placeholder'=>'Display Name *']) 
            }}
            @if ($errors->has('slug'))
            <span class="help-block">
            <strong>{{ $errors->first('slug') }}</strong>
            </span>
            @endif
        </div>
        </div> 
    </div>
    <div class="row">
        <footer class="">
        <center>
        {{ Form::submit('Create',['class' => 'btn btn-lg btn-success'])   }}
        </center>
        </footer>
    </div>
    {{ Form::close() }}
    <div class="upload add-file-result"></div>
