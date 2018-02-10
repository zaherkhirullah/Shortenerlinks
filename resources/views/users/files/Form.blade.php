@extends('layouts.layout')

@section('content')

<section class="scrollable padder">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">
							<i class="fa fa-file"></i> 
							@if(Route::is('files.create'))
                              Add New file 
                        @elseif(Route::is('files.edit'))
                              Edit This file
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
								@if(Route::is('files.create'))
                                @include('_includes.forms.user.file.create')
                            @elseif(Route::is('files.edit'))
                                 @include('_includes.forms.user.file.edit')
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