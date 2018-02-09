    {{ Form::open(array('route' => 'folders.store' , 'id'=>'Create_form')) }}


    <div class="col-md-8">
    <div class="col-md-6">
    <div class="form-group {{$errors->has('name') ? ' has-error' : ''}}">
    {!!  Form::label('name', 'Add name');   !!}

    {{Form::text('name','',
    ['class' => "form-control input-sm ",
    'id'=>'name'])  }}

    @if ($errors->has('name'))
    <span class="help-block">
    <strong>{{ $errors->first('name') }}</strong>
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
    {!! Form::submit('Create',['class' => 'btn btn-lg btn-success'])   !!}
    </center>

    </footer>
    </div>
    {!! Form::close() !!}

    <div class="upload add-file-result"></div>
