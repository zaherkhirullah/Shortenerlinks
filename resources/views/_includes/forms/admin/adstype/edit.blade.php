{{ Form::open(array('route' => ['adstypes.update',$adstype->id] ,'method'  => 'POST', 'id'=>'Edit_form')) }}
<div style="display: none;">
	{{ method_field('PUT') }}
	{{ csrf_field() }}
</div>

<div class="col-md-8">

<div class="col-md-6">
{{  Form::label('name', 'Ads Type name')   }}
<div class="form-group {{$errors->has('name') ? ' has-error' : ''}}">
{{   Form::text('name',$adstype->name, ['class' =>"form-control input-sm ",
'id'=>'name','placeholder'=>'Ads Type name *']) 
}}
@if ($errors->has('name'))
<span class="help-block">
<strong>{{ $errors->first('name') }}</strong>
</span>
@endif
</div>
</div>

<div class="col-md-8">
{{  Form::label('description', 'Ads Type description')   }}
<div class="form-group {{$errors->has('description') ? ' has-error' : ''}}">
{{ Form::text('description',$adstype->description,
['id'=>'path','placeholder'=>'Insert Ads Type description ','class' => "form-control ",'required' => 'required',])  
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
