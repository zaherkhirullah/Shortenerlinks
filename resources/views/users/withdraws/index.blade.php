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

    <section class="vbox lter box panel">
        <header class="box-header with-border text-center">
            <h3 class="box-title">
                <i class="fa fa-money"></i> @lang('lang.withdraws')
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
                    <small class="h5 text-muted m-b-xs block">
                            @lang('lang.avilable_earnings')
                    </small>
                </div>
                <div class="col-xs-6">
                  @if(count($withdraws) > 0)
                        <span class="h3 text-danger font-bold m-t-xs m-b-xs block">{{$withdraws->first()->amount}} $</span>
                        <small class="h5 text-muted m-b-xs block">
                                @lang('lang.last_pay_period')
                        </small>
                        <small>{{$withdraws->first()->created_at}}  </small>
                        @else
                        <span class="h3 text-danger font-bold m-t-xs m-b-xs block">0 $</span>
                        <small class="h5 text-muted m-b-xs block"> @lang('lang.last_pay_period')</small>
                   
                     @endif
                </div>
            </div>
            

            <p class="panel panel-body text-danger m-b-xl clearfix">
                Your earnings will be <b>automatically paid between 1'st day and 7th day after withdraw process</b> 
                but only if your earnings have reached a total of minimum or more for the previous day(s). In order to receive the payment you must fill up all the required fields in the settings section.
            </p>
            <div class="row text-center padder-v m-b-xl b-t b-b b-light bg-light lter pull-in">
                <div class="col-md-4">
                    <span class="h4 font-bold m-t-xs m-b-xs block"> @lang('lang.payment_proccessor')</span>
                    @if($PaymentMethod )
                        <small class="h5 text-success m-b-xs block">
                            {{ $PaymentMethod }}
                        </small>
                        @else
                        <small class="h5 text-danger m-b-xs block">
                            <i class="fa fa-times-circle"></i>
                            <a href="{{route('account.profile')}}" title="@lang('lang.click_to')@lang('lang.add') @lang('lang.pay_method')">
                                    @lang('lang.no_payment_way')
                              </a>
                        </small>
                        @endif
                </div>
                <div class="col-md-4">
                    <span class="h4 font-bold m-t-xs m-b-xs block">@lang('lang.payment') @lang('lang.email')</span>
                        @if($withdrawal_email)
                        <small class="h5 text-success m-b-xs block">
                            {{$withdrawal_email}}
                        </small>
                        @else
                        <small class="h5 text-danger m-b-xs block">
                            <i class="fa fa-times-circle"></i>
                            <a href="{{route('account.profile')}}" title="@lang('lang.click_to')@lang('lang.add') @lang('lang.email')">
                             @lang('lang.dont_have') @lang('lang.email')
                            </a>
                        </small>
                        @endif
                </div>
                <div class="col-md-4">
                    <span class="h4 font-bold m-t-xs m-b-xs block">@lang('lang.last_payment_date')</span>
                    @if(count($withdraws) > 0)
                    <small class="h5 text-success m-b-xs block">{{$withdraws->first()->created_at}} </small>
                    @else
                    <small class="h5 text-danger m-b-xs block">@lang('lang.no_payments')</small>
                    @endif
                </div>
            </div>
            <div class="col-md-12 form-group">
                    <div class="form-group text-center">
                    {{ Form::open(array('route' => 'withdraw.store' , 'method'  => 'POST','id'=>'withdraw_form')) }}

                            {{ csrf_field() }}  
                            <div class="col-md-4"></div>
                            <center>
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
                            <button type="submit" class="btn btn-lg btn-success"> @lang('lang.withdraw') </button>
       
                        </center>
                    </div>
                                   {{Form::close()}}
                    </div>
                </div>
                <div class="col-md-12">
                        <div class="col-md-6">
                                <ul class="panel panel-body">
                                    <li><b class="text-warning">Pending:</b> The payment is being checked by our team.</li>
                                    <li><b class="text-info">Approved:</b> The payment has been approved and is waiting to be sent.</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="panel panel-body">
                                    <li><b class="text-success">Complete: </b> The payment has been successfully sent to your account.</li>
                                    <li><b class="text-danger">Cancelled:</b>The payment has been cancelled.</li>
                                </ul>
                            </div>
                    </div>
        </section>                            
                        {{--  <div class="col-md-5">
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
                                       --}}

                                    
        <div class="panel panel-primary">
            <div class="panel panel-heading">
                <center>
                    <h4 class="font-thin">@lang('lang.transaction_history') </h4> 
                </center>   
            </div>
                
        <div class="panel panel-body">  
           @if(count($withdraws))
            <table class="table table-striped table-flip-scroll cf">
                <thead class="cf">
                    <tr>
                            <th>Id</th>                        
                            <th>@lang('lang.date')</th>                        
                            <th>@lang('lang.earnings')</th>                        
                            <th>@lang('lang.referrals_earnings')</th>                        
                            {{--  <th>@lang('lang.transaction_id')</th>  --}}
                            <th>@lang('lang.pay_method')</th>
                            <th>@lang('lang.amount')</th>
                            <th>@lang('lang.status')</th>    
                    </tr>
                </thead>
                <tbody>
                    @foreach($withdraws as $withdraw)
                        <tr>
                            <td>{{$withdraw->id}}  </td>  
                            <td>{{$withdraw->created_at}}  </td>  
                            <td>{{$totalEarnings}} </td>  
                            <td>{{$totalrefEarnings}}  </td>  
                             {{--  @if($withdraw->transaction_id)  --}}
                             {{--  <td>{{$withdraw->transaction_id}}  </td> --}}
                            {{--  @else  --}}
                            {{--  <td> null  </td> --}}
                            {{--  @endif  --}}
                            <td>{{$withdraw->paymethod->name}} 
                                    <dt class="text-info">{{$withdraw->withdraw_address}} </dt>
                                 </td>
                            <td>{{$withdraw->amount}}  $</td>
                            <td>
                            @if($withdraw->status ==1)
                            <dt> <b class="text-warning"><i class="fa fa-spinner"></i>@lang('lang.pending') </b></dt>
                            <dt>
                                    {{ Form::open(array('route' =>  ['withdraw.destroy',$withdraw->id], 'method'  => 'delete','id'=>'withdraw_form')) }}
                                    <input type="submit" class="text text-danger"  value="@lang('lang.cancle')">
                                    {{Form::close()}}                                      
                            </dt>   
                            @elseif($withdraw->status ==2)
                            <b class="text-info"><i class="fa fa-check"></i> @lang('lang.accepted') </b>
                            @elseif($withdraw->status ==3)
                                <b class="text-success"><i class="fa fa-lock"></i>@lang('lang.paid') </b>
                            @elseif($withdraw->status ==4)
                                <b class="text-danger"><i class="fa fa-times"></i>@lang('lang.cancled') </b>
                            @endif                                               
                            </td>
                            </tr>
                    @endforeach        
                </tbody>
            </table>
            @else
            <tr>
                <center  class="text-danger">
                <h3>@lang('lang.dont_have') @lang('lang.withdraw')</h3>
                </center> 
            </tr>
        @endif
    </div>
</div>
        </section>
    </section>
</section>     
@endsection
