    {{ Form::open(array('route' => 'aboutPlans.store' , 'method'  => 'POST','id'=>'Create_form')) }}


    <div class="col-md-8">
    <div class="col-md-6">
    <div class="form-group {{$errors->has('name') ? ' has-error' : ''}}">
    {{  Form::label('name', 'Add name')   }}

    {{Form::text('name','',
    ['class' => "form-control input-sm ",
    'id'=>'name','placeholder'=>'Add name'])  }}

    @if ($errors->has('name'))
    <span class="help-block">
    <strong>{{ $errors->first('name') }}</strong>
    </span>
    @endif
    </div>
    </div>


    <div class="col-md-6">
    {{  Form::label('description', 'Add description')   }}
    <div class="form-group {{$errors->has('description') ? ' has-error' : ''}}">
    {{   Form::text('description','', ['class' =>"form-control input-sm ",
    'id'=>'description','placeholder'=>'Add description']) 
    }}
    @if ($errors->has('description'))
    <span class="help-block">
    <strong>{{ $errors->first('description') }}</strong>
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
