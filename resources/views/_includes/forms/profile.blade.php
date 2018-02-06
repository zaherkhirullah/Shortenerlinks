
{!! Form::open(array ('route' => 'profile', 'method'  => 'POST',
'accept-charset'=>'utf-8','files'  => true)) !!}

<div style="display: none;">
	{{ method_field('PUT') }}
	{{ csrf_field() }}
</div>

<input type="hidden" name="id" value="3">
<legend class="text-center">
	<i class="fa fa-fw fa-file-text-o"></i> 
	User Profile Info 
</legend>

<div class="row">
	<div class="col-sm-6">
		<div class="form-group text {{ $errors->has('first_name') ? ' has-error' : '' }} required">
			{{ Form::label('first_name', 'First Name') }}
			{{ Form::text('first_name',Auth::user()->first_name, 
			['class' => 'form-control',
			'id' => 'first_name',
			'maxlength'=>'256' ,
			'placeholder'=>'First Name *'
			]) 
			,'autofocus'
		}}
		@if ($errors->has('first_name'))
		<span class="help-block">
			<strong>{{ $errors->first('first_name') }}</strong>
		</span>
		@endif   
	</div> 
  </div> 
<div class="col-sm-6">
	<div class="form-group text {{ $errors->has('last_name') ? ' has-error' : '' }} required">
		{{ Form::label('last_name', 'Last Name') }}
		{{ Form::text('last_name',Auth::user()->last_name,
		[
		'class' => 'form-control',
		'id' => 'last_name',
		'maxlength'=>'256' ,
		'placeholder'=>'Last Name *',
		]) 
		,'autofocus' 
	}}
	@if ($errors->has('last_name'))
	<span class="help-block">
		<strong>{{ $errors->first('last_name') }}</strong>
	</span>
	@endif   
</div>
</div>
<div class="col-sm-6">
		<div class="form-group text {{ $errors->has('username') ? ' has-error' : '' }} required">
			{{ Form::label('username', 'Username') }}
			{{ Form::text('username',Auth::user()->username, 
			['class' => 'form-control',
			'id' => 'username',
		    'disabled'=>'true',
			'maxlength'=>'256' ,
			]) 
			,'autofocus'
		}}
		@if ($errors->has('username'))
		<span class="help-block">
			<strong>{{ $errors->first('username') }}</strong>
		</span>
		@endif   
	</div> 
  </div>
<div class="col-sm-6">
		<div class="form-group text {{ $errors->has('email') ? ' has-error' : '' }} required">
			{{ Form::label('email', 'Email') }}
			{{ Form::text('email',Auth::user()->email, 
			['class' => 'form-control',
			'id' => 'email',
			'maxlength'=>'256' ,
			'disabled'=>'true',
			]) 
			,'autofocus'
		}}
		@if ($errors->has('email'))
		<span class="help-block">
			<strong>{{ $errors->first('email') }}</strong>
		</span>
		@endif   
	</div> 
  </div> 
</div>
<div class="row">
	<div class="col-sm-6">
		<div class="form-group text {{ $errors->has('address1') ? ' has-error' : '' }} required">
			{{ Form::label('address1', 'Address 1') }}
			{{ Form::text('address1',old('address1'), 
			['class' => 'form-control',
			'id' => 'address1',
			'maxlength'=>'256' ,
			'placeholder'=>'Address 1'
			]) 
			,'autofocus'
		}}

		@if ($errors->has('address1'))
		<span class="help-block">
			<strong>{{ $errors->first('address1') }}</strong>
		</span>
		@endif   
	</div> 
</div> 

<div class="col-sm-6">
	<div class="form-group text {{ $errors->has('address2') ? ' has-error' : '' }} required">
		{{ Form::label('address2', 'Address 2') }}
		{{ Form::text('address2',old('address2'), 
		['class' => 'form-control',
		'id' => 'address2',
		'maxlength'=>'256' ,
		'placeholder'=>'Address 2'
		]) 
		,'autofocus'
	}}

	@if ($errors->has('address2'))
	<span class="help-block">
		<strong>{{ $errors->first('address2') }}</strong>
	</span>
	@endif   
</div> 
</div>
</div>
<div class="row">
	<div class="col-sm-6">
		<div class="form-group text {{ $errors->has('city') ? ' has-error' : '' }} required">
			{{ Form::label('city', 'City') }}
			{{ Form::text('city',old('city'), 
			['class' => 'form-control',
			'id' => 'city',
			'maxlength'=>'256' ,
			'placeholder'=>'City'
			]) 
			,'autofocus'
			}}

		@if ($errors->has('city'))
		<span class="help-block">
			<strong>{{ $errors->first('city') }}</strong>
		</span>
		@endif   
		</div> 
	</div>
	<div class="col-sm-6">
		<div class="form-group text {{ $errors->has('state') ? ' has-error' : '' }} required">
			{{ Form::label('state', 'State') }}
			{{ Form::text('state',old('state'), 
			['class' => 'form-control',
			'id' => 'state',
			'maxlength'=>'256' ,
			'placeholder'=>'State'
			]) 
			,'autofocus'
				}}

			@if ($errors->has('state'))
			<span class="help-block">
				<strong>{{ $errors->first('state') }}</strong>
			</span>
			@endif   
		</div> 
	</div>
</div>
<div class="row">
	<div class="col-sm-6">
		<div class="form-group text {{ $errors->has('zip_code') ? ' has-error' : '' }} required">
			{{ Form::label('zip_code', 'ZIP') }}
			{{ Form::text('zip_code',old('zip_code'), 
			['class' => 'form-control',
			'id' => 'zip_code',
			'maxlength'=>'256' ,
			'placeholder'=>'ZIP'
			]) 
			,'autofocus'
		}}

			@if ($errors->has('zip_code'))
			<span class="help-block">
				<strong>{{ $errors->first('zip_code') }}</strong>
			</span>
			@endif   
		</div> 
	</div>

	<div class="col-sm-6">
		<div class="form-group select  {{ $errors->has('country_id') ? ' has-error' : '' }}  required">
			{!!  Form::label('country_id', 'Country');   !!}

			{{ Form::select('country_id', $countries ,$selectedCountry, 
			['class' => "form-control input-sm  $errors->has('country_id') ? ' has-error' : '' ",'id'=>'country_id'])  }}

				@if ($errors->has('country_id'))
				<span class="help-block">
					<strong>{{ $errors->first('country_id') }}</strong>
				</span>
				@endif


			</div> 
		</div> 
</div>
<div class="row">
	<div class="col-sm-6">
		<div class="form-group select  {{ $errors->has('withdrawal_method_id') ? ' has-error' : '' }}  required">
			{!!  Form::label('withdrawal_method_id', 'Withdrawal Method');   !!}

			{{ Form::select('withdrawal_method_id', $withdrawMethods ,$selectedMethod, 
			['class' => "form-control input-sm  $errors->has('withdrawal_method_id') ? ' has-error' : '' ",'id'=>'withdrawal_method_id'])  }}

			@if ($errors->has('withdrawal_method_id'))
			<span class="help-block">
				<strong>{{ $errors->first('withdrawal_method_id') }}</strong>
			</span>
			@endif
		</div> 
	</div> 
	<div class="col-sm-6">
		<div class="form-group">
			<div class="form-group text {{ $errors->has('withdrawal_email') ? ' 	has-error' : '' }} required">
				{{ Form::label('withdrawal_email', 'Withdrawal Email') }}
				{{ Form::text('withdrawal_email',old('withdrawal_email'), 
				['class' => 'form-control',
				'id' => 'withdrawal_email',
				'maxlength'=>'256' ,
				'placeholder'=>'name@email.com',
				'data-required'=>"true"
				]) 
				,'autofocus'
			}}

			@if ($errors->has('withdrawal_email'))
			<span class="help-block">
				<strong>{{ $errors->first('withdrawal_email') }}</strong>
			</span>
			@endif   
		</div> 
		</div>
		</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<div class="form-group text {{ $errors->has('phone_number') ? ' has-error' : '' }} required">
			{{ Form::label('phone_number', 'Phone Number') }}
			{{ Form::text('phone_number',old('phone_number'), 
			['class' => 'form-control',
			'id' => 'phone_number',

			'maxlength'=>'256' ,
			'placeholder'=>'0123456789'
			]) 
			,'autofocus'
		}}

		@if ($errors->has('phone_number'))
		<span class="help-block">
			<strong>{{ $errors->first('phone_number') }}</strong>
		</span>
		@endif   
	</div> 
</div> 
</div>

<footer class="row footer">
	<hr>
	<center>
		<button class="btn btn-primary btn-md" type="submit">Submit</button>
	</center>
	<hr>
</footer>

{!! Form::close() !!}

<legend class="text-center">Withdrawal Price table</legend>
<div class="col-md-12">
	<table class="table table-bordered table-hover table-striped">
		<tbody>
			<tr>
				<th>Withdrawal Method</th>
				<th>Minimum Withdrawal Amount</th>
			</tr>
			<tr>
				<td>My Wallet</td>
				<td>$5.00</td>
			</tr>
			<tr>
				<td>PayPal</td>
				<td>$1.00</td>
			</tr>
			<tr>
				<td>Payza</td>
				<td>$5.00</td>
			</tr>
			<tr>
				<td>Skrill</td>
				<td>$10.00</td>
			</tr>
			<tr>
				<td>Bitcoin</td>
				<td>$15.00</td>
			</tr>
			<tr>
				<td>Web Money</td>
				<td>$20.00</td>
			</tr>
			<tr>
				<td>Bank Transfer</td>
				<td>$100.00</td>
			</tr>
			<tr>
				<td>FaucetHub</td>
				<td>$10.00</td>
			</tr>
			<tr>
				<td>Payoneer</td>
				<td>$20.00</td>
			</tr>
			<tr>
				<td>Custom Withdrawal Method</td>
				<td>$3.00</td>
			</tr>
		</tbody>
	</table>
</div>
<div class="col-md-10 col-md-offset-1">
<blockquote class="help-block ">
	<p>- For PayPal, Payza, Skrill and Perfect Money add your email.</p>
	<p>- For Bitcoin add your wallet address.</p>
	<p>- For Web Money add your purse.</p>
	<p>- For Payeer add account, e-mail or phone number.</p>
	<p>- For bank transfer add your account holder name, Bank Name, City/Town, Country, Account number, SWIFT, IBAN and Account currency</p>
</blockquote>
</div>