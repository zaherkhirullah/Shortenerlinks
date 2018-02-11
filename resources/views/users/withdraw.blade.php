@extends('layouts.layout')

@section('content')
<section class="col-md-8">
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
                    <span class="h3 text-danger font-bold m-t-xs m-b-xs block">$0.015</span>
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
                    @if((Auth::user()->Profile->withdrawal_method_id) != null )
                        <small class="h5 text-success m-b-xs block">
                            {{Auth::user()->Profile->withdrawal_method_id}}
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
            <h4 class="font-thin">Transaction
                <b>History</b>
            </h4>
            <table class="table table-striped table-flip-scroll cf">
                <thead class="cf">
                    <tr>
                        <th>Transaction ID</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </section>
    </section>
</section>     
@endsection
