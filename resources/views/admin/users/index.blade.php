@extends('layouts.adlayout')

@section('content')

<div class="col-md-12">
<section class="lter box box-success">
<header class="box-header with-border text-center">
<h3 class="box-title">
<i class="fa fa-user">
</i> All Your users
</h3>
<div class="box-tools pull-right">
<button type="button" class="btn btn-box-tool" data-widget="collapse">
<i class="fa fa-minus"></i>
</button>
</div>
</header>
<!-- /.box-header -->
<section class="box-body">   
@if(count($users))
<table id="DataTable" class="mdl-data-table table-bordered table-hover" cellspacing="0" width="100%">

<div class="col-md-3 " style="top:10px;">
<a href="{{route('users.create')}}" type="button" class="btn btn-success btn-md">
<i class="fa fa-user"></i>
Add New user
</a>
</div>

<thead>
<tr>
<th>Full Name</th>
<th>Username</th>
<th> Email </th>
<th> Role </th>
<th>Created date</th>
<th>Options</th>
</tr>
</thead>
<tfoot>
<tr>
<th>Full Name</th>
<th>Username</th>
<th> Email </th>
<th> Role </th>
<th>Created date</th>
<th>Options</th>
</tr>
</tfoot>
<tbody>
@foreach ($users as $user)
<tr>
<td> {{$user->first_name}} {{$user->last_name}}</td>
<td> {{$user->username }}</td>
<td> {{$user->email }}</td>
<td> {{$user->role_id }}</td>
<td>{{$user->created_at }}</td>
<td class="text-center">
<dt>
<a href="{{route('users.edit',$user->id)}}" title="Edit" class="text-success" >
<span class="text" style="font-size:18px;">
<i class="fa fa-edit"></i> 
</span>
</a>
<a href="#delete-user-{{$user->id}}" title="Hide" data-toggle="modal" class=" text-danger" >
<span class="text" style="font-size:18px;">
<i class="fa  fa-eye-slash"></i> 
</span>	
</a>
</dt>
</td>
</tr>
<div class="modal fade" id="delete-user-{{$user->id}}">
<div class="modal-dialog modal-shorten">
<div class="modal-content bg-default">
<div class="modal-body">
<div class="padder">
{!! Form::open(array('route' =>['users.destroy',$user->id],
  'method'=>'delete','class'=>'form-delete','id'=>'form-delete' )) !!}
  <div class="text-center">
  <h4 id="msg-shorten ">Hide Shorten user</h4>
  </div>
  <p class="text-danger">Are You Sure You Want Hide
  <b class="text-success">{{$user->slug}}</b> user ?</p> 
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
  <h2 class="text-danger alert alert-info"> You don't have users</h2>
  </center>
  </div>
  <div class="text-clear col-md-12">  </div>
  <div class="col-md-12 text-center">
  <a href="{{route('users.create')}}" class="btn btn-success"> 
  Click to Add New user
  </a>
  </div>
  @endif 
  </section>
  </section>
  </div>  
  @endsection
  