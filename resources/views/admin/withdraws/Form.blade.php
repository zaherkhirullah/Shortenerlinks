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
							@if(Route::is('withdraws.create'))
                              Add New withdraw 
							@elseif(Route::is('withdraws.edit'))
								Edit This withdraw
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
								@if(Route::is('withdraws.create'))
                                  @include('_includes.forms.admin.withdraw.create')
                                @elseif(Route::is('withdraws.edit'))
                                  @include('_includes.forms.admin.withdraw.edit')
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