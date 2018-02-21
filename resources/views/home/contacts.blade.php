@extends('layouts.holayout')

@section('homeContent')

<div class="headline-bg rates-headline-bg"></div>
<section class="common-section section section-on-bg">
	<h2 class="name container text-center">
		Contact us Formu
	</h2>
	<div class="container text-center" >
		<div class="container-inner" style="border:1px solid #eee; box-shadow: 1px 30px 30px -5px rgba(0, 60,70, 0.5)">
			<div class="about " >
				<p>We pay for 
					<span class="highlight">
						ALL
					</span> 
					legitimate visitor you bring to your links and payout
					<span class="highlight">
						at least $1.5
					</span>
					per 1000 views.  
					Multiple views from the same viewer are 
					<span class="highlight">
						also counted
					</span>
					thus you will be benefiting from all your traffic.
				</p>
		    	{{ Form::open(array('route' => 'home.contacts.store' , 'id'=>'contacts_form')) }}
				
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group  {{$errors->has('name') ? ' has-error' : ''}}">
							{{  Form::label('name','Name *')   }}
				  <input id="name" type="text" class="form-control " placeholder="Add name *" name="name" required>
				  
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif

						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group  {{$errors->has('email') ? ' has-error' : ''}}">
							{{  Form::label('email','Email *')   }}
							{{Form::email('email','', ['class' =>
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
							{{  Form::label('subject','Subject *')   }}
							{{Form::text('subject','', ['class' =>"form-control input-sm" ,
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
							{{  Form::label('Message','Message *')   }}
							{{Form::textarea('Message','', ['class' =>
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
						{{ Form::submit('Send',[
							'class' => 'btn btn-cta btn-cta-secondary',
							'id'=>'send_btn'])   }}
					</p>
				</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
</section>
@endsection

@section('scripts')
<script type="text/javascript">
	
	$(document).ready(function(){
		$('#send_btn').click(function(e){
			e.preventDefault();	
			console.log('Hello');
			$.ajax({
				url:"{{route('home.contacts.store')}}",
				datatype:'html',
				type:'POST',
				data: {'_token':"{{ csrf_token() }}"},
				success: function(result){
					// console.log(result);
					document.getElementById('contacts_form').reset(),	
					alert(result),
				}
			});
				
		});
	});

</script>
@endsection