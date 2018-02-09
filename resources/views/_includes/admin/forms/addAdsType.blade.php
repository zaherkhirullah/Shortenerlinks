{{ Form::open(array('route' => 'adstypes.store' , 'id'=>'Create_form')) }}


<div class="col-md-8">

<div class="col-md-6">
{!!  Form::label('name', 'Add name');   !!}
<div class="form-group {{$errors->has('name') ? ' has-error' : ''}}">
{{   Form::text('name','', ['class' =>"form-control input-sm ",
'id'=>'name','placeholder'=>'Add name']) 
}}
@if ($errors->has('name'))
<span class="help-block">
<strong>{{ $errors->first('name') }}</strong>
</span>
@endif
</div>
</div>

<div class="col-md-8">
{!!  Form::label('description', 'Add description');   !!}
<div class="form-group {{$errors->has('description') ? ' has-error' : ''}}">
<!-- {!!  Form::label('description', 'description');   !!} -->
{!! Form::text('description','',
['id'=>'path','placeholder'=>'Insert Domain description ','class' => "form-control ",'required' => 'required',]);  
!!}
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
{!! Form::submit('Create',['class' => 'btn btn-lg btn-success'])   !!}
</center>

</footer>
</div>
{!! Form::close() !!}

<div class="upload add-file-result"></div>
