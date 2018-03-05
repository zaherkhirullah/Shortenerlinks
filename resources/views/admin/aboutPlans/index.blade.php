@extends('layouts.adlayout')

@section('content')

<div class="col-md-12">
	<section class="lter box box-success">
		<header class="box-header with-border text-center">
			<h3 class="box-title">
				<i class="fa fa-file-text">
				</i>@lang('lang.all') @lang('lang.aboutPlans')
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
			@if(count($aboutPlans))
			<table id="DataTable" class="mdl-data-table" cellspacing="0" width="100%">

				<div class="col-md-3 " style="top:10px;">
					<a href="{{route('aboutPlans.create')}}" type="button" class="btn btn-success btn-md">
							<i class="fa fa-plus-circle"></i>
                        @lang('lang.add') @lang('lang.new_aboutPlan')
					</a>
				</div>

				<thead>
					<tr>
							<th> @lang('lang.Name')</th>
							<th class="v-middle hidden-xs"> @lang('lang.Details')</th>
							<th class="v-middle hidden-xs"> @lang('lang.plans')</th>							
							<th class="v-middle hidden-xs"> @lang('lang.created_at')</th>
							<th class="v-middle hidden-xs"> @lang('lang.updated_at')</th>
							<th> @lang('lang.options')</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
							<th> @lang('lang.Name')</th>
							<th class="v-middle hidden-xs"> @lang('lang.Details')</th>
							<th class="v-middle hidden-xs"> @lang('lang.plans')</th>
							<th class="v-middle hidden-xs"> @lang('lang.created_at')</th>
							<th class="v-middle hidden-xs"> @lang('lang.updated_at')</th>
							<th> @lang('lang.options')</th>
					</tr>
				</tfoot>
				<tbody>
					@foreach ($aboutPlans as $aboutPlan)
					<tr>
						<td>{{$aboutPlan->name }}</td>
					<td>{{$aboutPlan->description}}</td>
						<td>
							
							@if($aboutPlan->plans )
								<ul>
							 @foreach($aboutPlan->plans as $plan)
								<li>
									{{$plan->name }}  |
									@if($description->pivot->value != 0 )
									<b>@lang('lang.yes')</b>
									@else
									<b> @lang('lang.no')</b>
									@endif
								</li>
							@endforeach
							</ul>
						@endif
						</td>
						<td>{{$aboutPlan->created_at }}</td>
						<td>{{$aboutPlan->updated_at }}</td>
						<td>
							<a href="{{route('aboutPlans.edit',$aboutPlan->id)}}" data-toggle="modal"class="text-success" >
								<span class="text">
									<i class="fa fa-2x fa-edit"></i> 
								</span>
							</a>
							<a href="#delete-aboutPlan-{{$aboutPlan->id}}" data-toggle="modal" class=" text-danger" >
								<span class="text">
									<i class="fa fa-2x fa-eye-slash"></i> 
								</span>	
							</a>
						</td>
					</tr>
					<div class="modal fade" id="delete-aboutPlan-{{$aboutPlan->id}}">
						<div class="modal-dialog modal-shorten">
							<div class="modal-content bg-default">
								<div class="modal-body">
									<div class="padder">
										{!! Form::open(array('route' =>['aboutPlans.destroy',$aboutPlan->id],
										'method'=>'post','class'=>'form-delete','id'=>'form-delete' )) !!}
										{{ csrf_field() }}
                     					 {{ method_field('DELETE') }}
										<div class="text-center">
											<h4 id="msg-shorten ">@lang('lang.hide')   @lang('lang.aboutPlan') </h4>
										</div>
										<p class="text-danger">@lang('lang.are_you_want')  @lang('lang.hide') 
											<b class="text-success">{{$aboutPlan->slug}}</b> @lang('lang.aboutPlan') ?</p> 
											<div class="modal-footer">
												<button type="button" class="btn btn-rounded pull-left btn-default" data-dismiss="modal">
													@lang('lang.cancle') 
												</button>
												<button id="btn-delete" class="btn btn-rounded  pull-right btn-success" type="submit">
													<i class="fa fa-eye-slash"></i> @lang('lang.hide') 
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
						<h2 class="text-danger alert alert-warning"> @lang('lang.dont_have')@lang('lang.aboutPlans')</h2>
					</center>
				</div>
				<div class="text-clear col-md-12">  </div>
				<div class="col-md-12 text-center">
					<a href="{{route('aboutPlans.create')}}" class="btn btn-success"> 
							@lang('lang.click_to')@lang('lang.add') @lang('lang.new_aboutPlan')
					</a>
				</div>
				@endif 
			</section>
		</section>
	</div> 
	@endsection
