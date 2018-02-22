@extends('layouts.adlayout')
@section('content')
<div class="col-md-12">
<section class="lter box box-info">
<header class="box-header with-border text-center">
    <h3 class="box-title">
        <i class="fa fa-withdraw-o">
        </i> All Your withdraws
    </h3>
    <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse">
            <i class="fa fa-minus"></i>
        </button>
    </div>
</header>
<!-- /.box-header -->
<section class="box-body ">   
    @if(count($withdraws))
    <table id="DataTable" class="mdl-data-table  table-hover" cellspacing="0" width="100%">
        <div class="col-md-3 " style="top:10px;">
            <a href="{{route('withdraws.create')}}" type="button" class="btn btn-success btn-md">
                <i class="fa fa-link"></i>
                Add New withdraw
            </a>
        </div>
        <thead>
            <tr>
                <th><b class="text-muted"><i class="fa fa-user"></i></b>  User Name </th>
                <th>Transaction ID</th>
                <th>withdraw Method </th>
                <th>Amount</th>                       
                <th>Status</th>
                <th>Created date</th>                        
                <th>Options</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th><b class="text-muted"><i class="fa fa-user"></i></b>  User Name </th>
                <th>Transaction ID</th>
                <th>withdraw Method </th>
                <th>Amount</th>                        
                <th>Status</th>
                <th>Created date</th>                        
                <th>Options</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($withdraws as $withdraw)
                <tr>
                    <td><a href="{{route('users.show',$withdraw->user->id)}}"> {{$withdraw->user->username }}</a></td>
                    <td>{{$withdraw->transaction_id }} </td>
                    <td>{{$withdraw->paymethod->name}} 
                            <dt class="text-info">{{$withdraw->withdraw_address}} </dt>
                         </td>
                    <td>{{$withdraw->amount }} $</td>
                    <td>
                    <b class="text-success">
                            @if($withdraw->status ==1)
                            <b class="text-warning"><i class="fa fa-spinner"></i> Pending</b>
                            @elseif($withdraw->status ==2)
                            <b class="text-info"><i class="fa fa-check"></i> Accepted </b>
                            @elseif($withdraw->status ==3)
                                <b class="text-success"><i class="fa fa-lock"></i> Paid</b>
                            @elseif($withdraw->status ==4)
                                <b class="text-danger"><i class="fa fa-times"></i> cancled</b>
                            @endif
                    </td>
                    <td>{{$withdraw->created_at }}</td>

                    <td>
                        <a href="{{route('withdraws.edit',$withdraw->id)}}" data-toggle="modal" class="text-success" >
                            <span class="text-md">
                                <i class="fa fa-edit"></i> 
                            </span>
                        </a>
                        @if($withdraw->status!=4 && $withdraw->status!=3)
                            <a href="#accept-request-{{$withdraw->id}}" title="Accept"  data-toggle="modal" class=" text-info" >
                                    <span class="text-md">
                                        <i class="fa fa-check"></i> 
                                    </span>
                            </a>
                            <a href="#paid-request-{{$withdraw->id}}" title="Paid"  data-toggle="modal" class=" text-success" >
                                <span class="text-md">
                                    <i class="fa fa-lock"></i> 
                                </span>
                            </a>
                            <a href="#cancle-request-{{$withdraw->id}}" title="Cancle" data-toggle="modal" class=" text-danger" >
                                <span class="text-md">
                                    <i class="fa fa-times"></i> 
                                </span>
                            </a>
                        @endif
                    </td>
                </tr>
                <div class="modal fade" id="accept-request-{{$withdraw->id}}">
                    <div class="modal-dialog modal-shorten">
                        <div class="modal-content bg-default">
                            <div class="modal-body">
                                <div class="padder">
                                {!! Form::open(array('route' =>['withdraws.update',$withdraw->id],
                                    'method'=>'PUT','class'=>'form-accept','id'=>'form-accept' )) !!}
                                        {{Form::hidden('status',2)}}
                                        {{Form::hidden('amount',$withdraw->amount)}}
                                        {{Form::hidden('transaction_id',$withdraw->transaction_id)}}
                                        {{Form::hidden('withdrawl_method_id',$withdraw->withdrawl_method_id)}}
                                        {{Form::hidden('user_id',$withdraw->user_id)}}
                                    
                                        <div class="text-center">
                                            <h4 id="msg-shorten ">Accept This withdraw Request</h4>
                                        </div>

                                        <p class="text-danger">Are You Sure You Want Accept This 
                                        <b class="text-success">{{$withdraw->amount }}</b> Request 
                                         for <b class="text-success">{{$withdraw->user->username }}</b> ?</p> 
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-rounded pull-left btn-default" data-dismiss="modal">
                                                cancle
                                            </button>
                                            <button id="btn-accept" class="btn btn-rounded  pull-right btn-success" type="submit">
                                                <i class="fa fa-check"></i> confirm
                                            </button>
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="paid-request-{{$withdraw->id}}">
                    <div class="modal-dialog modal-shorten">
                        <div class="modal-content bg-default">
                            <div class="modal-body">
                                <div class="padder">
                                {!! Form::open(array('route' =>['withdraws.update',$withdraw->id],
                                    'method'=>'PUT','class'=>'form-paid','id'=>'form-paid' )) !!}
                                        {{Form::hidden('status',3)}}
                                        {{Form::hidden('amount',$withdraw->amount)}}
                                        {{Form::hidden('withdrawl_method_id',$withdraw->withdrawl_method_id)}}
                                        {{Form::hidden('user_id',$withdraw->user_id)}}
                                    
                                        <div class="text-center">
                                            <h4 id="msg-shorten ">This request Paid</h4>
                                        </div>

                                        <p class="text-danger">Really this withdraw 
                                        <b class="text-success">{{$withdraw->amount }}</b> has been paided 
                                         for <b class="text-success">{{$withdraw->user->username }} account</b> ?</p> 
                                       <div class="form-group {{$errors->has('transaction_id') ? ' has-error' : ''}}">
                                            {{ Form::text('transaction_id','',
                                            ['id'=>'transaction_id','placeholder'=>'transaction number','class' => "form-control ",'required' => 'required',])  
                                            }}
                                            @if ($errors->has('transaction_id'))
                                            <span class="help-block">
                                              <strong>{{ $errors->first('transaction_id') }}</strong>
                                            </span>
                                            @endif
                                          </div>
                                         <div class="modal-footer">
                                            <button type="button" class="btn btn-rounded pull-left btn-danger" data-dismiss="modal">
                                                No
                                            </button>
                                            <button id="btn-paid" class="btn btn-rounded  pull-right btn-success" type="submit">
                                                <i class="fa fa-check"></i> yes
                                            </button>
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="cancle-request-{{$withdraw->id}}">
                    <div class="modal-dialog modal-shorten">
                        <div class="modal-content bg-default">
                            <div class="modal-body">
                                <div class="padder">
                                {!! Form::open(array('route' =>['withdraws.update',$withdraw->id],
                                    'method'=>'PUT','class'=>'form-cancle','id'=>'form-cancle' )) !!}
                                        {{Form::hidden('status',4)}}
                                        {{Form::hidden('amount',$withdraw->amount)}}
                                        {{Form::hidden('transaction_id',$withdraw->transaction_id)}}
                                        {{Form::hidden('withdrawl_method_id',$withdraw->withdrawl_method_id)}}
                                        {{Form::hidden('user_id',$withdraw->user_id)}}
                                    
                                        <div class="text-center">
                                            <h4 id="msg-shorten ">Cancle This withdraw Request</h4>
                                        </div>

                                        <p class="text-danger">Are You Sure You Want Cancle This 
                                        <b class="text-success">{{$withdraw->amount }}</b> Request 
                                        thats for <b class="text-success">{{$withdraw->user->username }}</b> ?</p> 
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-rounded pull-left btn-default" data-dismiss="modal">
                                                cancle
                                            </button>
                                            <button id="btn-cancle" class="btn btn-rounded  pull-right btn-success" type="submit">
                                                <i class="fa fa-trash"></i> confirm
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
        <h2 class="text-danger alert alert-warning"> You don't have withdraws</h2>
    </center>
    </div>
    <div class="text-clear col-md-12">  </div>
    <div class="col-md-12 text-center">
        <a href="{{route('withdraws.create')}}" class="btn btn-success"> 
            Click to Add New withdraw
        </a>
    </div>
    @endif 
</section>
</section>
</div>  
@endsection
