@extends('layouts.adlayout')
@section('content')
  
<section class="scrollable padder">
    <section class="content">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <i class="fa fa-plus"> </i> 
                           Edit This Contacts
                    </h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="display: block;">
                    <div class="box-short" id="shorterNew" >
                        <div class="box box-solid shorten-member">
                            <div class="box-body">
                            {{ Form::open(array('route' => ['contacts.update',$contact->id] , 'id'=>'Contacts_form')) }}
                            {{ method_field('PUT') }}
	                        {{ csrf_field() }}

                <div class="row">
					<div class="col-sm-6">
						<div class="form-group  {{$errors->has('name') ? ' has-error' : ''}}">
							{!!  Form::label('name','Name *')   !!}
				  <input id="name" type="text" class="form-control " value="{{$contact->name}}" placeholder="Add name *" name="name" required>
				  
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif

						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group  {{$errors->has('email') ? ' has-error' : ''}}">
							{!!  Form::label('email','Email *')   !!}
							{{Form::email('email',$contact->email, ['class' =>
							"form-control input-sm  ",
							'id'=>'email','placeholder'=>'Add Email'])  }}
							
							@if ($errors->has('email'))
							<span class="help-block">
								<strong>{{ $errors->first('email') }}
								</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="col-sm-12">
						<div class="form-group  {{$errors->has('subject') ? ' has-error' : ''}}">
							{!!  Form::label('subject','Subject *')   !!}
							{{Form::text('subject',$contact->subject, ['class' =>"form-control input-sm" ,
							'id'=>'subject','required'=>'true','placeholder'=>'Add subject'])  
						     }}
							@if ($errors->has('subject'))
							<span class="help-block">
								<strong>
									{{ $errors->first('subject') }}
								</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="col-sm-12">
						<div class="form-group  {{$errors->has('Message') ? ' has-error' : ''}}">
							{!!  Form::label('Message','Message *')   !!}
							{{Form::textarea('Message',$contact->Message, ['class' =>
							"form-control input-sm ",
							'id'=>'Message','required'=>'true','placeholder'=>'Add Message'])  }}
							@if ($errors->has('Message'))
							<span class="help-block">
								<strong>{{ $errors->first('Message') }}
								</strong>
							</span>
							@endif
						</div>
					</div>
				</div>
				<div class="join-us text-center">
					<p>
						{!! Form::submit('Send',['class' => 'btn btn-success btn-cta-secondary',
						'onclick'=>'submitForm()'])   !!}
					</p>
				</div>
				{!! Form::close() !!}
                          
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>


        @endsection