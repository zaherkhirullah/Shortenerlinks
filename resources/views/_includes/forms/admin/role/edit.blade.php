    {{ Form::open(array('route' =>  ['roles.update',$role->id] ,'method'  => 'POST', 'id'=>'Update_form')) }}
    <div style="display: none;">
	{{ method_field('PUT') }}
	{{ csrf_field() }}
</div>
    <div class="col-md-6">
    <div class="form-group {{$errors->has('name') ? ' has-error' : ''}}">
    {{  Form::label('name', 'Role name')   }}

    {{Form::text('name',$role->name,
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
    {{   Form::text('slug',$role->slug, ['class' =>"form-control input-sm ",
    'id'=>'slug','placeholder'=>'Display Name *']) 
    }}
    @if ($errors->has('slug'))
    <span class="help-block">
    <strong>{{ $errors->first('slug') }}</strong>
    </span>
    @endif
    </div>
    </div>



    <div style="clear:both">
    <hr><br>
    </div>
    <footer class="panel-footer">
    <center>
    {{ Form::submit('Update',['class' => 'btn btn-lg btn-success'])   }}
    </center>

    </footer>
    </div>
    {{ Form::close() }}

    <div class="upload Edit-file-result"></div>
