@extends('layouts.adlayout')

@section('content')

<div class="col-md-12">
        <section class="lter box panel">
<header class="box-header with-border text-center">
<h3 class="box-title">
<i class="fa fa-user">
</i> @lang('lang.all')  @lang('lang.users')
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
{{--  <!-- 
<div class="col-md-3 " style="top:10px;">
<a href="{{route('users.create')}}" type="button" class="btn btn-success btn-md">
<i class="fa fa-user"></i>
Add New user
</a>
</div> -->  --}}

    <thead>
    <tr>
        <th> @lang('lang.Name')</th>
        <th> @lang('lang.username')</th>
        <th> @lang('lang.email')</th>
        <th> @lang('lang.role')</th>
        <th>@lang('lang.created_at')</th>                        
        <th>@lang('lang.options')</th>
    </tr>
    </thead>
    <tfoot>
        <tr>
            <th> @lang('lang.Name')</th>
            <th> @lang('lang.username')</th>
            <th> @lang('lang.email')</th>
            <th> @lang('lang.role')</th>
            <th>@lang('lang.created_at')</th>                        
            <th>@lang('lang.options')</th>>
        </tr>
    </tfoot>
<tbody>
@foreach ($users as $user)
<tr>
<td> {{$user->first_name}} {{$user->last_name}}</td>
<td> {{$user->username }}</td>
<td> {{$user->email }}</td>
<td> {{$user->role->slug }}</td>
<td>{{$user->created_at }}</td>
<td class="text-center">
<dt>
<a href="{{route('users.edit',$user->id)}}" title="Edit" class="text-success" >
<span class="text" style="font-size:18px;">
<i class="fa fa-edit"></i> 
</span>
</a>
<a href="#delete-user-{{$user->id}}" title="@lang('lang.hide') " data-toggle="modal" class=" text-danger" >
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
  <h4 id="msg-shorten ">@lang('lang.hide') @lang('lang.user')</h4>
  </div>
  <p class="text-danger">@lang('lang.are_you_want') @lang('lang.hide')
  <b class="text-success">{{$user->username}}</b> @lang('lang.user') ?</p> 
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
  <h2 class="text-danger alert alert-warning"> @lang('lang.dont_have')  @lang('lang.users')</h2>
  </center>
  </div>
  {{--  <div class="text-clear col-md-12">  </div>
  <div class="col-md-12 text-center">
  <a href="{{route('users.create')}}" class="btn btn-success"> 
  @lang('lang.click_to') @lang('lang.add') @lang('lang.new_user')  
  </a>
  </div>  --}}
  @endif 
  </section>
  </section>
  </div>  
  @endsection
  