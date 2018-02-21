@extends('layouts.layout')

@section('content')
<section class="col-md-8">

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

    <section class="vbox lter box box-info">
        <header class="box-header with-border text-center">
            <h3 class="box-title">
                <i class="fa fa-users">
                </i> Withdraw
            </h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                    <i class="fa fa-minus">
                    </i>
                </button>
           
            </div>
        </header>
        <!-- /.box-header -->
        <section class="box-body scrollable hover">
            <div class="row text-center m-b-xl">
                <div class="col-xs-6 b-r b-light">
                    <span class="h3 text-danger font-bold m-t-xs m-b-xs block">${{$Balance}}</span>
                    <small class="h5 text-muted m-b-xs block">Available Earnings</small>
                </div>
                <div class="col-xs-6">
                    <span class="h3 text-danger font-bold m-t-xs m-b-xs block">$0</span>
                    <small class="h5 text-muted m-b-xs block">Last Pay Period</small>
                </div>
            </div>
            <p class="h5 text-muted m-b-xl clearfix">Your earnings will be 
                <b>automatically paid on 1st day and 15th day of each month</b> 
                but only if your earnings have reached a total of $5.00 or more for the previous day(s). In order to receive the payment you must fill up all the required fields in the settings section.
            </p>
            <div class="row text-center padder-v m-b-xl b-t b-b b-light bg-light lter pull-in">
                <div class="col-md-4">
                    <span class="h4 font-bold m-t-xs m-b-xs block">Payment processor</span>
                    @if(($PaymentMethod) != null )
                        <small class="h5 text-success m-b-xs block">
                            {{ $PaymentMethod }}
                        </small>
                        @else
                        <small class="h5 text-danger m-b-xs block">
                            <i class="fa fa-times-circle"></i>
                            <a href="{{route('account.profile')}}" title="Click To add email">
                              No Payment way 
                              </a>
                        </small>
                        @endif

                 
                </div>
                <div class="col-md-4">
                    <span class="h4 font-bold m-t-xs m-b-xs block">Payment email</span>
                        @if((Auth::user()->Profile->withdrawal_email) != "-")
                        <small class="h5 text-success m-b-xs block">
                            {{Auth::user()->Profile->withdrawal_email}}
                        </small>
                        @else
                        <small class="h5 text-danger m-b-xs block">
                            <i class="fa fa-times-circle"></i>
                            <a href="{{route('account.profile')}}" title="Click To add email">
                            No Email 
                            </a>
                        </small>
                        @endif
                </div>
                <div class="col-md-4">
                    <span class="h4 font-bold m-t-xs m-b-xs block">Next Payment date</span>
                    <small class="h5 text-success m-b-xs block">2018-02-01</small>
                </div>
            </div>
            <div class="col-md-12">
                    <div class="form-group text-center">
      {{ Form::open(array('route' => 'withdraw.store' , 'method'  => 'POST','id'=>'withdraw_form')) }}

                            {{ csrf_field() }}  
                        <div class="col-md-3">
                            <div class="form-group {{$errors->has('amount') ? ' has-error' : ''}}">
                                    {{ Form::text('amount','',
                                    ['id'=>'path','placeholder'=>'amount','class' => "form-control ",'required' => 'required',])  
                                    }}
                                    @if ($errors->has('amount'))
                                    <span class="help-block">
                                      <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                    @endif
                            </div> 
                        </div>  
                        <div class="col-md-3">
                                <div class="form-group {{$errors->has('withdraw_address') ? ' has-error' : ''}}">
                                        {{ Form::text('withdraw_address','',
                                        ['id'=>'path','placeholder'=>'withdraw address','class' => "form-control ",'required' => 'required',])  
                                        }}
                                        @if ($errors->has('withdraw_address'))
                                        <span class="help-block">
                                          <strong>{{ $errors->first('withdraw_address') }}</strong>
                                        </span>
                                        @endif
                                </div>   
                        </div> 
                                     
                            <button type="submit" class="btn btn-success"> Withdraw </button>
                {{Form::close()}}
                        </div>
                    </div>
            <h4 class="font-thin">Transaction
                <b>History</b>
            </h4>
            <table class="table table-striped table-flip-scroll cf">
                <thead class="cf">
                    <tr>
                            <th>Date</th>                        
                            <th>Transaction ID</th>
                            <th>Method</th>
                            <th>Amount</th>
                            <th>Status</th>    
                    </tr>
                </thead>
                <tbody>
                    @foreach($withdraws as $withdraw)
                        <tr>
                            <td>{{$withdraw->created_at}}  </td>                            
                             @if($withdraw->transaction_id)
                             <td>{{$withdraw->transaction_id}}  </td>                            
                            @else
                            <td> null  </td>                            
                            @endif

                            <td>{{$withdraw->withdrawal_method_id}}  </td>
                            <td>{{$withdraw->amount}}  $</td>
                            <td>
                            @if($withdraw->status ==1)
                            <dt> <b class="text-warning"><i class="fa fa-spinner"></i> Pending</b></dt>
                            <dt>
                                    {{ Form::open(array('route' =>  ['withdraw.destroy',$withdraw->id], 'method'  => 'delete','id'=>'withdraw_form')) }}
                                    {{Form::submit('Cancle',['class'=> 'text text-danger'])}}
                                    {{Form::close()}}                                      
                            </dt>   
                            @elseif($withdraw->status ==2)
                            <b class="text-info"><i class="fa fa-check"></i> Accepted </b>
                            @elseif($withdraw->status ==3)
                                <b class="text-success"><i class="fa fa-lock"></i> Paid</b>
                            @elseif($withdraw->status ==4)
                                <b class="text-danger"><i class="fa fa-times"></i> cancled</b>
                            @endif                                               
                            </td>
                            </tr>
                    @endforeach        
                </tbody>
            </table>
        </section>
    </section>
</section>     
@endsection
