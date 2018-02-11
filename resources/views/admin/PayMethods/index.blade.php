@extends('layouts.adlayout')

@section('content')

<div class="col-md-12">
	<section class="lter box box-success">
		<header class="box-header with-border text-center">
			<h3 class="box-title">
				<i class="fa fa-PayMethod">
				</i> All Your PayMethods
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
			@if(count($PayMethods))
			<table id="DataTable" class="mdl-data-table" cellspacing="0" width="100%">

				<div class="col-md-3 " style="top:10px;">
					<a href="{{route('PayMethods.create')}}" type="button" class="btn btn-success btn-md">
						<i class="fa fa-PayMethod"></i>
						Add New PayMethod
					</a>
				</div>

				<thead>
					<tr>
					<th>Name</th>
					<th>Min Amount</th>
					<th>Icon</th>
					<th>Created date</th>
					<th>Update date</th>
					<th>Options</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
					<th>Name</th>
					<th>Min Amount</th>
					<th>Icon</th>
					<th>Created date</th>
					<th>Update date</th>
					<th>Options</th>
					</tr>
				</tfoot>
				<tbody>
					@foreach ($PayMethods as $PayMethod)
					<tr>
						<td>{{$PayMethod->name }}</td>
						<td>{{$PayMethod->min_amount }} $</td>
						<td>{{$PayMethod->icon }}</td>
						<td>{{$PayMethod->created_at }}</td>
						<td>{{$PayMethod->updated_at }}</td>
						<td>
							<a href="{{route('PayMethods.edit',$PayMethod->id)}}" data-toggle="modal"class="text-success" >
								<span class="text">
									<i class="fa fa-2x fa-edit"></i> 
								</span>
							</a>
							<a href="#delete-PayMethod-{{$PayMethod->id}}" data-toggle="modal" class=" text-danger" >
								<span class="text">
									<i class="fa fa-2x fa-eye-slash"></i> 
								</span>	
							</a>
						</td>
					</tr>
					<div class="modal fade" id="delete-PayMethod-{{$PayMethod->id}}">
						<div class="modal-dialog modal-shorten">
							<div class="modal-content bg-default">
								<div class="modal-body">
									<div class="padder">
										{!! Form::open(array('route' =>['PayMethods.destroy',$PayMethod->id],
										'method'=>'delete','class'=>'form-delete','id'=>'form-delete' )) !!}
										<div class="text-center">
											<h4 id="msg-shorten ">Hide  PayMethod</h4>
										</div>
										<p class="text-danger">Are You Sure You Want Hide
											<b class="text-success">{{$PayMethod->slug}}</b> PayMethod ?</p> 
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
						<h2 class="text-danger alert alert-warning"> You don't have PayMethods</h2>
					</center>
				</div>
				<div class="text-clear col-md-12">  </div>
				<div class="col-md-12 text-center">
					<a href="{{route('PayMethods.create')}}" class="btn btn-success"> 
						Click to Add New PayMethod
					</a>
				</div>
				@endif 
			</section>
		</section>
	</div> 
	@endsection
