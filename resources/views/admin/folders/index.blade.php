@extends('layouts.adlayout')

@section('content')

<div class="col-md-12">
	<section class="lter box box-success">
		<header class="box-header with-border text-center">
			<h3 class="box-title">
				<i class="fa fa-folder">
				</i> All Your folders
			</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse">
					<i class="fa fa-minus"></i>
				</button>
			</div>
		</header>
		<!-- /.box-header -->
		<section class="box-body">   
			@if(count($folders))
			<table id="DataTable" class="mdl-data-table table-bordered table-hover" cellspacing="0" width="100%">

				<div class="col-md-3 " style="top:10px;">
					<a href="{{route('folders.create')}}" type="button" class="btn btn-success btn-md">
						<i class="fa fa-folder"></i>
						Add New folder
					</a>
				</div>

				<thead>
					<tr>
						<th>Name</th>
						<th>Created date</th>
						<th>Update date</th>
						<th>Options</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Name</th>
						<th>Created date</th>
						<th>Update date</th>
						<th>Options</th>
					</tr>
				</tfoot>
				<tbody>
					@foreach ($folders as $folder)
					<tr>
						<td>{{$folder->name }}</td>
						<td>{{$folder->created_at }}</td>
						<td>{{$folder->updated_at }}</td>
						<td>
							<a href="{{route('folders.edit',$folder->id)}}" data-toggle="modal"class="text-success" >
								<span class="text">
									<i class="fa fa-2x fa-edit"></i> 
								</span>
							</a>
							<a href="#delete-folder-{{$folder->id}}" data-toggle="modal" class=" text-danger" >
								<span class="text">
									<i class="fa fa-2x fa-trash"></i> 
								</span>	
							</a>
						</td>
					</tr>
					<div class="modal fade" id="delete-folder-{{$folder->id}}">
						<div class="modal-dialog modal-shorten">
							<div class="modal-content bg-default">
								<div class="modal-body">
									<div class="padder">
										{!! Form::open(array('route' =>['folders.destroy',$folder->id],
										'method'=>'delete','class'=>'form-delete','id'=>'form-delete' )) !!}
										<div class="text-center">
											<h4 id="msg-shorten ">Delete folder</h4>
										</div>
										<p class="text-danger">Are You Sure You Want Delete
											<b class="text-success">{{$folder->slug}}</b> folder ?</p> 
											<div class="modal-footer">
												<button type="button" class="btn btn-rounded pull-left btn-default" data-dismiss="modal">
													cancle
												</button>
												<button id="btn-delete" class="btn btn-rounded  pull-right btn-success" type="submit">
													<i class="fa fa-trash"></i> Delete
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
						<h2 class="text-danger alert alert-warning"> You don't have folders</h2>
					</center>
				</div>
				@if(Route::is('folders.index'))
					<div class="text-clear col-md-12">  </div>
					<div class="col-md-12 text-center">
						<a href="{{route('folders.create')}}" class="btn btn-success"> 
							Click to Add New folder
						</a>
					</div>
				@endif 
				@endif 
				</section>
				</section>
				</div>  
		@endsection
