
{!! Form::open(array ('route' => 'Psettings', 'method'  => 'POST',
'accept-charset'=>'utf-8','files'  => true)) !!}

<div style="display: none;">
		{{ method_field('POST') }}
		{{ csrf_field() }}
	</div>

<legend class="text-center">
	<i class="fa fa-fw fa-cog"></i> 
	@lang('lang.edit')	 @lang('lang.all')	@lang('lang.settings')
</legend>
<div class="col-sm-12">
		<div class="row">
	@foreach($options as $option )	
		<div class="col-sm-6">
				<div class="form-group text {{ $errors->has($option->name) ? ' has-error' : '' }} required">
					{{ Form::label($option->name,$option->name) }}
				{{ Form::text($option->name,$option->value ? $option->value:$option->intV, 
					['class' => 'form-control',
					'id' => 'first_name',
					'maxlength'=>'256' ,
					'placeholder'=>$option->name
					]) 
					,'autofocus'
				}}
				@if ($errors->has($option->name))
				<span class="help-block">
					<strong>{{ $errors->first($option->name) }}</strong>
				</span>
				@endif   
			</div> 
		</div>
	@endforeach
	</div>
	</div>
		<footer class="row footer">
				<hr>
				<center>
					<button class="btn btn-primary btn-md" type="submit">@lang('lang.edit')</button>
				</center>
				<hr>
		</footer>  
		

{!! Form::close() !!}

	