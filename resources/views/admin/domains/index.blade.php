@extends('layouts.adlayout')

@section('content')

<div class="col-md-12">
	<section class="lter box box-success">
		<header class="box-header with-border text-center">
			<h3 class="box-title">
				<i class="fa fa-domain">
				</i>@lang('lang.all') @lang('lang.domains')
			</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse">
					<i class="fa fa-minus"></i>
				</button>
			</div>
		</header>
		<!-- /.box-header -->

		<!--/ SEARCH BOX -->
		<section class="box-body">   
			@if(count($domains))
			<table id="DataTable" class="mdl-data-table" cellspacing="0" width="100%">

				<div class="col-md-3 " style="top:10px;">
					<a href="{{route('domains.create')}}" type="button" class="btn btn-success btn-md">
						<i class="fa fa-domain"></i>
                        @lang('lang.add') @lang('lang.new_domain')
					</a>
				</div>

				<thead>
					<tr>
							<th> @lang('lang.Name')</th>
							<th> @lang('lang.slug')</th>
							<th> @lang('lang.url')</th>
							<th> @lang('lang.created_at')</th>
							<th> @lang('lang.updated_at')</th>
							<th> @lang('lang.options')</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
							<th> @lang('lang.name')</th>
							<th> @lang('lang.slug')</th>
							<th class="v-middle hidden-xs"> @lang('lang.url')</th>
							<th class="v-middle hidden-xs"> @lang('lang.created_at')</th>
							<th class="v-middle hidden-xs"> @lang('lang.updated_at')</th>
							<th> @lang('lang.options')</th>
					</tr>
				</tfoot>
				<tbody>
					@foreach ($domains as $domain)
					<tr>
						<td>{{$domain->name }}</td>
						<td>{{$domain->slug }}</td>
						<td>{{$domain->url }}</td>
						<td>{{$domain->created_at }}</td>
						<td>{{$domain->updated_at }}</td>
						<td>
							<a href="{{route('domains.edit',$domain->id)}}" data-toggle="modal"class="text-success" >
								<span class="text">
									<i class="fa fa-2x fa-edit"></i> 
								</span>
							</a>
							<a href="#delete-domain-{{$domain->id}}" data-toggle="modal" class=" text-danger" >
								<span class="text">
									<i class="fa fa-2x fa-eye-slash"></i> 
								</span>	
							</a>
						</td>
					</tr>
					<div class="modal fade" id="delete-domain-{{$domain->id}}">
						<div class="modal-dialog modal-shorten">
							<div class="modal-content bg-default">
								<div class="modal-body">
									<div class="padder">
										{!! Form::open(array('route' =>['domains.destroy',$domain->id],
										'method'=>'post','class'=>'form-delete','id'=>'form-delete' )) !!}
										{{ csrf_field() }}
                     					 {{ method_field('DELETE') }}
										<div class="text-center">
											<h4 id="msg-shorten ">Hide  domain</h4>
										</div>
										<p class="text-danger">Are You Sure You Want Hide
											<b class="text-success">{{$domain->slug}}</b> domain ?</p> 
											<div class="modal-footer">
												<button type="button" class="btn btn-rounded pull-left btn-default" data-dismiss="modal">
													cancle
												</button>
												<button id="btn-delete" class="btn btn-rounded  pull-right btn-success" type="submit">
													<i class="fa fa-eye-slash"></i> Hide
												</button>
											</div>
											{!! Form::close() !!}
										</div>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</tbody>
				</table>
								
				@else
				<div class="col-md-8 col-md-offset-2">
					<center> 
						<h2 class="text-danger alert alert-warning"> You don't have domains</h2>
					</center>
				</div>
				<div class="text-clear col-md-12">  </div>
				<div class="col-md-12 text-center">
					<a href="{{route('domains.create')}}" class="btn btn-success"> 
						Click to Add New domain
					</a>
				</div>
				@endif 
			</section>
		</section>
	</div> 
	@endsection
