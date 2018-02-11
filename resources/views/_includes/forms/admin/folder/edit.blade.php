{{ Form::open(array('route' =>  ['folders.update',$folder->id],'method'  => 'POST', 'id'=>'edit_form')) }}
<div style="display: none;">
	{{ method_field('PUT') }}
	{{ csrf_field() }}
</div>

<div class="col-md-8">
<div class="col-md-6">
<div class="form-group {{$errors->has('name') ? ' has-error' : ''}}">
{{  Form::label('name', 'edit name')   }}

{{Form::text('name',$folder->name,
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
{{ Form::submit('Edit',['class' => 'btn btn-lg btn-success'])   }}
</center>

</footer>
</div>
{{ Form::close() }}

<div class="upload edit-file-result"></div>
