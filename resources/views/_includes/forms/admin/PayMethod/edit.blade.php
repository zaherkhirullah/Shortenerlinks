    {{ Form::open(array('route' => ['PayMethods.update',$PayMethod->id] ,'method'  => 'POST', 'id'=>'Edit_form')) }}
    <div style="display: none;">
	{{ method_field('PUT') }}
	{{ csrf_field() }}
</div>

    <div class="col-md-6">
    <div class="form-group {{$errors->has('name') ? ' has-error' : ''}}">
    {{  Form::label('name', 'Edit name')   }}

    {{Form::text('name',$PayMethod->name,
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
    {{  Form::label('min_amount', 'Edit min amount')   }}
    <div class="form-group {{$errors->has('min_amount') ? ' has-error' : ''}}">
    {{   Form::text('min_amount',$PayMethod->min_amount, ['class' =>"form-control input-sm ",
    'id'=>'min_amount','placeholder'=>'Edit min amount']) 
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
    {{ Form::submit('Edit',['class' => 'btn btn-lg btn-success'])   }}
    </center>
    
    </footer>
    </div>
    {{ Form::close() }}

    <div class="upload Edit-file-result"></div>
