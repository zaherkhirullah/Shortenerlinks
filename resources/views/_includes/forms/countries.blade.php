
{!! Form::open(array ('route' => 'Pcountries', 'method'  => 'POST',
'accept-charset'=>'utf-8','files'  => true)) !!}

<div style="display: none;">
		{{ method_field('POST') }}
		{{ csrf_field() }}
	</div>

<legend class="text-center">
	<i class="fa fa-fw fa-cog"></i> 
	@lang('lang.edit')	 @lang('lang.all')	@lang('lang.countries')
</legend>
<div class="col-sm-12">
    <div class="row">
            <div class="col-sm-6">
                    {{ Form::label('Name',\Lang::get('lang.name')) }}              
                <div class="col-sm-3">
                    {{ Form::label('Name', Lang::get('lang.link_price') ) }} 
                </div>
                <div class="col-sm-3">
                    {{ Form::label('Name', Lang::get('lang.file_price') ) }}  
                </div>
            </div>
            <div class="col-sm-6">
                    {{ Form::label('Name',\Lang::get('lang.name')) }}              
                <div class="col-sm-3">
                    {{ Form::label('Name', Lang::get('lang.link_price') ) }} 
                </div>
                <div class="col-sm-3">
                    {{ Form::label('Name', Lang::get('lang.file_price') ) }}  
                </div>
            </div>
    @foreach($countries as $country)     
    <div class="col-sm-6">
            {{ Form::label($country->name, $country->name) }}
            <div class="col-sm-3">               
                <div class="form-group text {{ $errors->has('link_price_'.$country->id) ? ' has-error' : '' }} required">
                    {{ Form::text('link_price_'.$country->id,$country->link_price, 
                        ['class' => 'form-control',
                        'maxlength'=>'256' ,
                        'placeholder'=>\Lang::get('lang.link_price')
                        ]) 
                        ,'autofocus'
                    }}
                    @if ($errors->has('link_price_'.$country->id))
                    <span class="help-block">
                        <strong>{{ $errors->first('link_price_'.$country->id) }}</strong>
                    </span>
                    @endif 
                </div> 
            </div>
            <div class="col-sm-3">
                                            
                <div class="form-group text {{ $errors->has('file_price_'.$country->id) ? ' has-error' : '' }} required">
                    {{ Form::text('file_price_'.$country->id,$country->file_price, 
                        ['class' => 'form-control',
                        'maxlength'=>'256' ,
                        'placeholder'=>\Lang::get('lang.file_price')
                        ]) 
                        ,'autofocus'
                    }}
                    @if ($errors->has('file_price_'.$country->id))
                    <span class="help-block">
                        <strong>{{ $errors->first('file_price_'.$country->id) }}</strong>
                    </span>
                    @endif 
                </div> 
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

	