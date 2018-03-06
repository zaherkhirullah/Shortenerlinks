@extends('layouts.adlayout')

@section('content')

<section class="scrollable padder">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
					<div class="panel">
					<div class="box-header with-border text-center">
						<h3 class="box-title ">
							<i class="fa fa-send"></i> 
							@if(Route::is('tickets.create'))
							@lang('lang.add')  @lang('lang.new_ticket') 
							@elseif(Route::is('tickets.edit'))
							@lang('lang.edit')  @lang('lang.ticket')
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
						
						<div class="box-short" id="uploadFileNew" >
							<div class="box box-solid shorten-member">
								<div class="box-body">
								@include('_includes.forms.admin.ticket.create')
								@if(Route::is('tickets.create'))
                                  @include('_includes.forms.admin.ticket.create')
                                @elseif(Route::is('tickets.edit'))
                                  @include('_includes.forms.admin.ticket.edit')
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