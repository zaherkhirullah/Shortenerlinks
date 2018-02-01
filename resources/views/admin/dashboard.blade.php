@extends('layouts.adlayout')
<!-- <?php
// $this->assign('title', __('Dashboard'));
// $this->assign('description', '');
// $this->assign('content_title', __('Dashboard'));
?> -->
@section('content')

<section class="vbox">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    <section class="scrollable padder">
        <section class="content">
            <div class="text-center">
                <div style="display: inline-block;">
                    <form method="get" accept-charset="utf-8" action="/member/dashboard">
                        <div class="form-group select ">
                            <select name="month" class="form-control input-lg" onchange="this.form.submit();" style="width: 300px;" id="month">
                                <option value="2018-01">January 2018</option>
                            </select>
                        </div>
                        <button class="hidden" type="submit">Submit</button>
                    </form> 
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                   <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>0</h3>
                        <p>Total Views</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-bar-chart">
                        </i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">

                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>$0.00</h3>
                        <p>Total Earnings</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-shopping-cart">
                        </i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">

                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>$0.00</h3>
                        <p>Referral Earnings</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-exchange">
                        </i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">

                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>0</h3>
                        <p>Average CPM</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-usd">
                        </i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
               <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>0</h3>
                    <p>Total Views</p>
                </div>
                <div class="icon">
                    <i class="fa fa-bar-chart">
                    </i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">

            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>$0.00</h3>
                    <p>Total Earnings</p>
                </div>
                <div class="icon">
                    <i class="fa fa-shopping-cart">
                    </i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">

            <div class="small-box bg-green">
                <div class="inner">
                    <h3>$0.00</h3>
                    <p>Referral Earnings</p>
                </div>
                <div class="icon">
                    <i class="fa fa-exchange">
                    </i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">

            <div class="small-box bg-red">
                <div class="inner">
                    <h3>0</h3>
                    <p>Average CPM</p>
                </div>
                <div class="icon">
                    <i class="fa fa-usd">
                    </i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
           <div class="small-box bg-yellow">
            <div class="inner">
                <h3>0</h3>
                <p>Total Views</p>
            </div>
            <div class="icon">
                <i class="fa fa-bar-chart">
                </i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">

        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>$0.00</h3>
                <p>Total Earnings</p>
            </div>
            <div class="icon">
                <i class="fa fa-shopping-cart">
                </i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">

        <div class="small-box bg-green">
            <div class="inner">
                <h3>$0.00</h3>
                <p>Referral Earnings</p>
            </div>
            <div class="icon">
                <i class="fa fa-exchange">
                </i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">

        <div class="small-box bg-red">
            <div class="inner">
                <h3>0</h3>
                <p>Average CPM</p>
            </div>
            <div class="icon">
                <i class="fa fa-usd">
                </i>
            </div>
        </div>
    </div>
</div>
<aside class="bg-light lter b-l aside-md hide" id="notes">
    <div class="wrapper">Notification</div>
</aside>


@endsection
