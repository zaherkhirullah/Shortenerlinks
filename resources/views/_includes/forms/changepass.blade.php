{!! Form::open(array ('route' => 'changepassword', 'method'  => 'POST',
'accept-charset'=>'utf-8','files'  => true)) !!}

<div style="display: none;">
	{{ method_field('PUT') }}
	{{ csrf_field() }}
</div>
<legend class="text-center">
	<i class="fa fa-fw fa-key"></i> 
	Change Password
</legend>

<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
		<div class="form-group text {{ $errors->has('password') ? ' has-error' : '' }} required">
			{{ Form::label('password', 'Old Password') }}
			{{ Form::password('password', 
			['class' => 'form-control',
			'id' => 'password',
			'maxlength'=>'256' ,
			'placeholder'=>'Old Password *'
			]) 
			,'autofocus'
		}}

		@if ($errors->has('password'))
		<span class="help-block">
			<strong>{{ $errors->first('password') }}</strong>
		</span>
		@endif   
	</div> 
</div> 

<div class="col-sm-8 col-sm-offset-2">
	<div class="form-group text {{ $errors->has('new_password') ? ' has-error' : '' }} required">
		{{ Form::label('new_password', 'New Password') }}
		{{ Form::password('new_password', 
		['class' => 'form-control',
		'id' => 'new_password',
		'maxlength'=>'256' ,
		'placeholder'=>'New Password *'
		]) 
		,'autofocus'
	}}

	@if ($errors->has('new_password'))
	<span class="help-block">
		<strong>{{ $errors->first('new_password') }}</strong>
	</span>
	@endif   
</div> 
</div> 

<div class="col-sm-8 col-sm-offset-2">
	<div class="form-group text {{ $errors->has('conf_new_password') ? ' has-error' : '' }} required">
		{{ Form::label('conf_new_password', 'Confirm New Password') }}
		{{ Form::password('conf_new_password', 
		['class' => 'form-control',
		'id' => 'conf_new_password',
		'maxlength'=>'256' ,
		'placeholder'=>'Confirm New Password *'
		]) 
		,'autofocus'
	}}

	@if ($errors->has('conf_new_password'))
	<span class="help-block">
		<strong>{{ $errors->first('conf_new_password') }}</strong>
	</span>
	@endif   
</div> 
</div> 

</div>
<footer class="panel-footer text-center bg-light lter">
	<button type="submit" class="btn btn-success btn-s-xs">Update</button>
</footer>
{!! Form::close() !!}
