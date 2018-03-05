    {{ Form::open(array('route' => ['plans.update',$plan->id] ,'method'  => 'POST', 'id'=>'Edit_form')) }}
    <div style="display: none;">
	{{ method_field('PUT') }}
	{{ csrf_field() }}
</div>

    <div class="col-md-8">
    <div class="col-md-6">
    <div class="form-group {{$errors->has('name') ? ' has-error' : ''}}">
    {{  Form::label('name', 'Edit name')   }}

    {{Form::text('name',$plan->name,
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
    {{  Form::label('slug', 'Edit Slug')   }}
    <div class="form-group {{$errors->has('slug') ? ' has-error' : ''}}">
    {{   Form::text('slug',$plan->slug, ['class' =>"form-control input-sm ",
    'id'=>'slug','placeholder'=>'Edit slug']) 
    }}
    @if ($errors->has('slug'))
    <span class="help-block">
    <strong>{{ $errors->first('slug') }}</strong>
    </span>
    @endif
    </div>
    </div>

    <div class="col-md-8">
    {{  Form::label('url', 'Edit url')   }}
    <div class="form-group {{$errors->has('url') ? ' has-error' : ''}}">
    <!-- {{  Form::label('url', 'url')   }} -->
    {{ Form::text('url',$plan->url,
    ['id'=>'path','placeholder'=>'Insert plan Url ','class' => "form-control ",'required' => 'required',])  
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
    {{ Form::submit('Edit',['class' => 'btn btn-lg btn-success'])   }}
    </center>

    </footer>
    </div>
    {{ Form::close() }}

    <div class="upload Edit-file-result"></div>
