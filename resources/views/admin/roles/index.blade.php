@extends('layouts.adlayout')

@section('content')

<div class="col-md-12">
  <section class="lter box box-success">
    <header class="box-header with-border text-center">
      <h3 class="box-title">
        <i class="fa fa-role">
        </i> All Your roles
      </h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse">
          <i class="fa fa-minus"></i>
        </button>
      </div>
    </header>
    <!-- /.box-header -->
    <section class="box-body">   
      @if(count($roles))
      <table id="DataTable" class="mdl-data-table table-bordered table-hover" cellspacing="0" width="100%">

<div class="col-md-3 " style="top:10px;">
  <a href="{{route('roles.create')}}" type="button" class="btn btn-success btn-md">
    <i class="fa fa-role"></i>
    Add New role
  </a>
</div>

<thead>
  <tr>
  <th>Display Name</th>
  <th>Role Name</th>
    <th>Created date</th>
    <th>Options</th>
  </tr>
</thead>
<tfoot>
  <tr>
    <th>Display Name</th>
    <th>Role Name</th>
    <th>Created date</th>
    <th>Options</th>
  </tr>
</tfoot>
<tbody>
  @foreach ($roles as $role)
  <tr>
   <td>{{$role->name}}</td>
  <td>{{$role->slug}}</td>
 
  <td>{{$role->created_at }}</td>
    <td class="text-center">
      <a href="{{route('roles.edit',$role->id)}}" title="Edit" class="text-success" >
        <span class="text" style="font-size:18px;">
          <i class="fa fa-edit"></i> 
        </span>
      </a>
      <a href="#delete-role-{{$role->id}}" title="Hide" data-toggle="modal" class=" text-danger" >
        <span class="text" style="font-size:18px;">
          <i class="fa  fa-eye-slash"></i> 
        </span>	
      </a>
    </td>
  </tr>
  <div class="modal fade" id="delete-role-{{$role->id}}">
    <div class="modal-dialog modal-shorten">
      <div class="modal-content bg-default">
        <div class="modal-body">
          <div class="padder">
            {!! Form::open(array('route' =>['roles.destroy',$role->id],
            'method'=>'post','class'=>'form-delete','id'=>'form-delete' )) !!}
            {{ csrf_field() }}
                      {{ method_field('DELETE') }}
            <div class="text-center">
              <h4 id="msg-shorten ">Hide Shorten role</h4>
            </div>
            <p class="text-danger">Are You Sure You Want Hide
              <b class="text-success">{{$role->slug}}</b> role ?</p> 
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
    <h2 class="text-danger alert alert-warning"> You don't have roles</h2>
  </center>
</div>
<div class="text-clear col-md-12">  </div>
<div class="col-md-12 text-center">
  <a href="{{route('roles.create')}}" class="btn btn-success"> 
    Click to Add New role
  </a>
</div>
@endif 
</section>
</section>
</div>  
@endsection
