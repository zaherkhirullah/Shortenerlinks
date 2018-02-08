

{!! Form::open(array ('route' => 'changePassword', 'method'  => 'POST',
'accept-charset'=>'utf-8','class'  => 'form-horizontal')) !!}

<div style="display: none;">
	{{ method_field('PUT') }}
	{{ csrf_field() }}
</div>
<legend class="text-center">
	<i class="fa fa-fw fa-key"></i> 
	Change Password
</legend>

<div class="row">
<div class="col-md-12">
	
@if (session('error'))
	<div class="alert alert-danger">
		{{ session('error') }}
	</div>
	@endif
	{{ session('error') }}
	</div>
	@if (session('success'))
	<div class="alert alert-success">
		{{ session('success') }}
	</div>
	@endif
	
</div> 
	<div class="col-sm-8 col-sm-offset-2">
		<div class="form-group {{ $errors->has('current_password') ? ' has-error' : '' }} required">
			{{ Form::label('current_password', 'Old Password',['class'=>'col-md-4 control-label']) }}
			<div class="col-md-8">
				{{ Form::password('current_password', 
					['class' => 'form-control',
					'id' => 'current_password',
					'maxlength'=>'256' ,
					'placeholder'=>'Old Password *'
					,'autofocus']) 
			  }}
		  </div>

		@if ($errors->has('current_password'))
		<span class="help-block">
			<strong>{{ $errors->first('current_password') }}</strong>
		</span>
		@endif   
	</div> 
    </div>
<div class="col-sm-8 col-sm-offset-2">
	<div class="form-group {{ $errors->has('new_password') ? ' has-error' : '' }} required">
		{{ Form::label('new_password', 'New Password',['class'=>'col-md-4 control-label']) }}
		<div class="col-md-8">
			{{ Form::password('new_password', 
			['class' => 'form-control',
			'id' => 'new_password',
			'maxlength'=>'256' ,
			'placeholder'=>'New Password *'
			,'autofocus'
			]) 
		}}
	</div>

	@if ($errors->has('new_password'))
	<span class="help-block">
		<strong>{{ $errors->first('new_password') }}</strong>
	</span>
	@endif   
</div> 
</div> 

<div class="col-sm-8 col-sm-offset-2">
	<div class="form-group  {{ $errors->has('new_password_confirm') ? ' has-error' : '' }} required">
		{{ Form::label('new_password_confirm', 'Confirm New Password',['class'=>'col-md-4 control-label']) }}
		<div class="col-md-8">
			{{ Form::password('new_password_confirm', 
			['class' => 'form-control',
			'id' => 'new_password_confirm',
			'maxlength'=>'256' ,
			'placeholder'=>'Confirm New Password *'
			,'autofocus'
			]) 
		}}
	  </div>

	@if ($errors->has('new_password_confirm'))
	<span class="help-block">
		<strong>{{ $errors->first('new_password_confirm') }}</strong>
	</span>
	@endif   
</div> 
</div> 

</div>
<footer class="text-center bg-light lter">
	<button type="submit" class="btn btn-success btn-s-xs">Change password</button>
</footer>
{!! Form::close() !!}
