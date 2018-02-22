
{{ Form::open(array ('route' => 'account.PchangePassword', 'method'  => 'POST',
'accept-charset'=>'utf-8','class'  => 'form-horizontal')) }}

<div style="display: none;">
	{{ method_field('POST') }}
	{{ csrf_field() }}
</div>
<legend class="text-center">
	<i class="fa fa-fw fa-key"></i> Change Password
</legend>

<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<div class="form-group {{ $errors->has('current_password') ? ' has-error' : '' }} required">
				<div class="input-group">
						<span for="current_password" title="current_password"   class="input-group-addon"> 
							<i class="ion ion-android-lock" ></i>
						</span>
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
	<div class="col-sm-6 col-sm-offset-3">
	<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
			<div class="input-group">
				<span for="password" title="password"   class="input-group-addon"> 
					<i class="ion ion-android-unlock" ></i>
				</span>
				<input id="password" type="password" placeholder="Password" class="form-control" name="password" required>
				@if ($errors->has('password'))
				<span class="help-block">
					<strong>{{ $errors->first('password') }}</strong>
				</span>
				@endif

			</div>
		</div>
		<div class="form-group">
			<div class="input-group">
				<span for="password-confirm" title="password-confirm"  class="input-group-addon">
					<i class="ion ion-android-unlock" ></i>
				</span>
				<input id="password-confirm" type="password" class="form-control" name="password_confirmation"  placeholder="Repeat Password" required>

			</div>
		</div>
	</div>
	</div>   
</div>
<footer class="text-center bg-light lter">
	{{ Form::submit('Change password',['class' => 'btn btn-success btn-md'])   }}
</footer>
{{ Form::close() }}




