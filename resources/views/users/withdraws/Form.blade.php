@extends('layouts.layout')

@section('content')

<section class="scrollable padder">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box panel">
					<div class="box-header with-border">
						<h3 class="box-title">
							<i class="fa fa-ticket"></i> 
							@if(Route::is('ticket.create'))
                              Add New ticket 
                        @elseif(Route::is('ticket.edit'))
                              Edit This ticket
                        @endif 
						</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse">
								<i class="fa fa-minus"></i>
							</button>
						</div>
					</div>
					<!-- /.box-header -->
					<div class="box-body" style="display: block;">
						
						<div class="box-short" id="uploadticketNew" >
							<div class="box box-solid shorten-member">
								<div class="box-body">
								@if(Route::is('ticket.create'))
                                @include('_includes.forms.user.ticket.create')
                            @elseif(Route::is('ticket.edit'))
                                 @include('_includes.forms.user.ticket.edit')
                            @endif 
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</section>
@endsection