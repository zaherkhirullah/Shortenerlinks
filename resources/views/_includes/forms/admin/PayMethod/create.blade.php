    {{ Form::open(array('route' => 'PayMethods.store' , 'method'  => 'POST','id'=>'Create_form')) }}


    <div class="col-md-12">
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
    {{  Form::label('min_amount', 'Add min amount')   }}
    <div class="form-group {{$errors->has('min_amount') ? ' has-error' : ''}}">
    {{   Form::text('min_amount','', ['class' =>"form-control input-sm ",
    'id'=>'min_amount','placeholder'=>'Add min amount']) 
    }}
    @if ($errors->has('min_amount'))
    <span class="help-block">
    <strong>{{ $errors->first('min_amount') }}</strong>
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

    <div class="upload add-file-result"></div>
