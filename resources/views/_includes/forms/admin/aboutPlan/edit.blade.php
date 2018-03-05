    {{ Form::open(array('route' => ['aboutPlans.update',$aboutPlan->id] ,'method'  => 'POST', 'id'=>'Edit_form')) }}
    <div style="display: none;">
	{{ method_field('PUT') }}
	{{ csrf_field() }}
</div>

    <div class="col-md-8">
    <div class="col-md-6">
    <div class="form-group {{$errors->has('name') ? ' has-error' : ''}}">
    {{  Form::label('name', 'Edit name')   }}

    {{Form::text('name',$aboutPlan->name,
    ['class' => "form-control input-sm ",
    'id'=>'name','placeholder'=>'Edit name'])  }}

    @if ($errors->has('name'))
    <span class="help-block">
    <strong>{{ $errors->first('name') }}</strong>
    </span>
    @endif
    </div>
    </div>


    <div class="col-md-6">
    {{  Form::label('description', 'Edit description')   }}
    <div class="form-group {{$errors->has('description') ? ' has-error' : ''}}">
    {{   Form::text('description',$aboutPlan->description, ['class' =>"form-control input-sm ",
    'id'=>'description','placeholder'=>'Edit description']) 
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
    {{ Form::submit('Edit',['class' => 'btn btn-lg btn-success'])   }}
    </center>

    </footer>
    </div>
    {{ Form::close() }}

    <div class="upload Edit-file-result"></div>
