@extends('layouts.layout')
<!-- <?php
// $this->assign('title', __('Dashboard'));
// $this->assign('description', '');
// $this->assign('content_title', __('Dashboard'));
?> -->
@section('content')

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
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">
                                <i class="fa fa-leaf">
                                </i> Your Links 15
                            </h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="display: block;">

                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-aqua">
                                    <div class="inner">
                                        <h3>
                                            <span class="sum color1">20.101702</span>
                                            <sup style="font-size: 20px"> </sup>
                                        </h3>
                                        <p>Mining Gh/s</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-ios-speedometer-outline"> </i>
                                    </div>
                                    <a href="deposit?add" class="small-box-footer">More info
                                        <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-green">
                                    <div class="inner">
                                        <h3>
                                            <span class="sum color1">0.000000</span>
                                            <sup style="font-size: 20px">BTC</sup>
                                        </h3>
                                        <p>Your payments</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-social-usd-outline">
                                        </i>
                                    </div>
                                    <a href="operations" class="small-box-footer">More info 
                                        <i class="fa fa-arrow-circle-right"> </i>
                                    </a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-yellow">
                                    <div class="inner">
                                        <h3>
                                            <span class="sum color1">0.000698</span>
                                            <sup style="font-size: 20px">BTC</sup>
                                        </h3>
                                        <p>On deposits</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-ios-locked-outline">
                                        </i>
                                    </div>
                                    <a href="deposits" class="small-box-footer">More info 
                                        <i class="fa fa-arrow-circle-right">
                                        </i>
                                    </a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-red">
                                    <div class="inner">
                                        <h3>
                                            <span class="sum color1">0.000000</span>
                                            <sup style="font-size: 20px">BTC</sup>
                                        </h3>
                                        <p>Free</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-ios-unlocked-outline">
                                        </i>
                                    </div>
                                    <a href="operation?add=CASHOUT" class="small-box-footer">More info
                                        <i class="fa fa-arrow-circle-right">
                                        </i>
                                    </a>
                                </div>
                            </div>
                            <!-- ./col -->
                        </div>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.col-md-12  -->
                <div class="col-md-12">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">
                                <i class="fa fa-leaf"> 
                                </i> Your Files 15
                            </h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="display: block;">


                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-teal">
                                    <div class="inner">
                                        <h3>
                                            <span class="sum color1">0.000000</span>
                                            <sup style="font-size: 20px">BTC</sup>
                                        </h3>
                                        <p>Balance add</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-ios-undo-outline">
                                        </i>
                                    </div>
                                    <a href="operation?add=CASHIN" class="small-box-footer">More info 
                                        <i class="fa fa-arrow-circle-right">
                                        </i>
                                    </a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-olive">
                                    <div class="inner">
                                        <h3></h3>
                                        <br><br>
                                        <p>Your payment wallet</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-ios-cog-outline"></i>
                                    </div>
                                    <a href="balance/wallets" class="small-box-footer">More info
                                        <i class="fa fa-arrow-circle-right"> </i>
                                    </a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-yellow-active">
                                    <div class="inner">
                                        <h3>
                                            <span class="sum color1">0.000000</span>
                                            <sup style="font-size: 20px">BTC</sup>
                                        </h3>
                                        <p>Referral</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-ios-personadd-outline">
                                        </i>
                                    </div>
                                    <a href="refsys" class="small-box-footer">More info 
                                        <i class="fa fa-arrow-circle-right">
                                        </i>
                                    </a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-red-active">
                                    <div class="inner">
                                        <span class="url color2">https://argusminer.cash/?miner=Azlove96</span>
                                        <sup style="font-size: 20px">
                                        </sup>
                                        <br>
                                        <br>
                                        <p>Your referral link</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-ios-people-outline">
                                        </i>
                                    </div>
                                    <a href="refsys" class="small-box-footer">More info
                                        <i class="fa fa-arrow-circle-right">
                                        </i>
                                    </a>
                                </div>
                            </div>
                            <!-- ./col -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                            <a href="javascript:void(0)" class="uppercase">View All Posts </a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.col-md-12  -->
                <div class="col-md-12">
                    <div class="box box-warning box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Last 5 profit</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="display: block;">
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
                            <!-- ./col -->

                            <div class="col-lg-3 col-xs-6">

                                <div class="small-box bg-aqua">
                                    <div class="inner">
                                        <h3>$0.00</h3>
                                        <p>Total Earnings</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-shopping-bag">
                                        </i>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->

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
                            <!-- ./col -->

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
                            <!-- ./col -->
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.col-md-12  -->
            </div>
             <!--/ROW--> 
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">
                                <i class="fa fa-leaf">
                                </i> Recently Added Posts 15
                            </h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="display: block;">

                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.col-md-6  -->
                <div class="col-md-6">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">
                                <i class="fa fa-leaf">
                                </i> Recently Added Posts 15
                            </h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="display: block;">


                        </div>
                        <!-- /.box-body -->

                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col-md-6  -->
            </div> 
             <!--/Row-->
            <div class="row">

                <div class="col-md-3">

                    <!-- Info Boxes Style 2 -->
                    <div class="info-box bg-yellow">
                        <span class="info-box-icon">
                            <i class="ion ion-ios-speedometer-outline">
                            </i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">worked</span>
                            <span class="info-box-number">108Days</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 100%">
                                </div>
                            </div>
                            <span class="progress-description">
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    <div class="info-box bg-green">
                        <span class="info-box-icon">
                            <i class="ion ion-ios-people-outline">
                            </i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Users</span>
                            <span class="info-box-number">9643</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 100%">
                                </div>
                            </div>
                            <span class="progress-description">
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    <div class="info-box bg-red">
                        <span class="info-box-icon">
                            <i class="ion ion-ios-cloud-upload-outline">
                            </i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">deposit</span>
                            <span class="info-box-number">7811</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 100%">
                                </div>
                            </div>
                            <span class="progress-description">
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    <!-- /.info-box -->
                    <div class="info-box bg-aqua">
                        <span class="info-box-icon">
                            <i class="ion-ios-chatbubble-outline">
                            </i>
                        </span>
                        <div class="info-box-content">
                            <p>You have bonus for start 0.000698 BTC Just make purchase of a bonus package</p>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <div class="col-md-3">
                    <!-- Info Boxes Style 2 -->
                    <div class="info-box bg-yellow">
                        <span class="info-box-icon">
                            <i class="ion ion-ios-speedometer-outline">
                            </i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">worked</span>
                            <span class="info-box-number">108Days</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 100%">
                                </div>
                            </div>
                            <span class="progress-description">
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    <div class="info-box bg-green">
                        <span class="info-box-icon">
                            <i class="ion ion-ios-people-outline">
                            </i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Users</span>
                            <span class="info-box-number">9643</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 100%">
                                </div>
                            </div>
                            <span class="progress-description">
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    <div class="info-box bg-red">
                        <span class="info-box-icon">
                            <i class="ion ion-ios-cloud-upload-outline">
                            </i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">deposit</span>
                            <span class="info-box-number">7811</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 100%">
                                </div>
                            </div>
                            <span class="progress-description">
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    <!-- /.info-box -->
                    <div class="info-box bg-aqua">
                        <span class="info-box-icon">
                            <i class="ion-ios-chatbubble-outline">
                            </i>
                        </span>
                        <div class="info-box-content">
                            <p>You have bonus for start 0.000698 BTC Just make purchase of a bonus package</p>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <div class="col-md-3">
                    <!-- Info Boxes Style 2 -->
                    <div class="info-box bg-yellow">
                        <span class="info-box-icon">
                            <i class="ion ion-ios-speedometer-outline">
                            </i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">worked</span>
                            <span class="info-box-number">108Days</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 100%">
                                </div>
                            </div>
                            <span class="progress-description">
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    <div class="info-box bg-green">
                        <span class="info-box-icon">
                            <i class="ion ion-ios-people-outline">
                            </i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Users</span>
                            <span class="info-box-number">9643</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 100%">
                                </div>
                            </div>
                            <span class="progress-description">
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    <div class="info-box bg-red">
                        <span class="info-box-icon">
                            <i class="ion ion-ios-cloud-upload-outline">
                            </i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">deposit</span>
                            <span class="info-box-number">7811</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 100%">
                                </div>
                            </div>
                            <span class="progress-description">
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    <!-- /.info-box -->
                    <div class="info-box bg-aqua">
                        <span class="info-box-icon">
                            <i class="ion-ios-chatbubble-outline">
                            </i>
                        </span>
                        <div class="info-box-content">
                            <p>You have bonus for start 0.000698 BTC Just make purchase of a bonus package</p>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <div class="col-md-3">
                    <!-- Info Boxes Style 2 -->
                    <div class="info-box bg-yellow">
                        <span class="info-box-icon">
                            <i class="ion ion-ios-speedometer-outline">
                            </i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">worked</span>
                            <span class="info-box-number">108Days</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 100%">
                                </div>
                            </div>
                            <span class="progress-description">
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    <div class="info-box bg-green">
                        <span class="info-box-icon">
                            <i class="ion ion-ios-people-outline">
                            </i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Users</span>
                            <span class="info-box-number">9643</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 100%">
                                </div>
                            </div>
                            <span class="progress-description">
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    <div class="info-box bg-red">
                        <span class="info-box-icon">
                            <i class="ion ion-ios-cloud-upload-outline">
                            </i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">deposit</span>
                            <span class="info-box-number">7811</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 100%">
                                </div>
                            </div>
                            <span class="progress-description">
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    <!-- /.info-box -->
                    <div class="info-box bg-aqua">
                        <span class="info-box-icon">
                            <i class="ion-ios-chatbubble-outline">
                            </i>
                        </span>
                        <div class="info-box-content">
                            <p>You have bonus for start 0.000698 BTC Just make purchase of a bonus package</p>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
             <!--/Row-->
            <div class="row">
                <!-- PRODUCT LIST -->
                <div class="col-md-4">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title"><i class="fa fa-leaf"> </i> Posts 5</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <!-- Info Boxes Style 2 -->
                            <div class="info-box bg-yellow">
                                <span class="info-box-icon">
                                    <i class="ion ion-ios-speedometer-outline">
                                    </i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">worked</span>
                                    <span class="info-box-number">108Days</span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 100%">
                                        </div>
                                    </div>
                                    <span class="progress-description">
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                            <div class="info-box bg-green">
                                <span class="info-box-icon">
                                    <i class="ion ion-ios-people-outline">
                                    </i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Users</span>
                                    <span class="info-box-number">9643</span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 100%">
                                        </div>
                                    </div>
                                    <span class="progress-description">
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                            <div class="info-box bg-red">
                                <span class="info-box-icon">
                                    <i class="ion ion-ios-cloud-upload-outline">
                                    </i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">deposit</span>
                                    <span class="info-box-number">7811</span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 100%">
                                        </div>
                                    </div>
                                    <span class="progress-description">
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                            <!-- /.info-box -->
                            <div class="info-box bg-aqua">
                                <span class="info-box-icon">
                                    <i class="ion-ios-chatbubble-outline">
                                    </i>
                                </span>
                                <div class="info-box-content">
                                    <p>You have bonus for start 0.000698 BTC Just make purchase of a bonus package</p>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->

                            <!-- /.col -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                            <a href="javascript:void(0)" class="uppercase">View All Posts </a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                </div>
                <!-- /.box -->
                <!-- Pages LIST -->
                <div class="col-md-4">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><i class="fa fa-file-o"> </i>  Pages 12</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <!-- Info Boxes Style 2 -->
                            <div class="info-box bg-yellow">
                                <span class="info-box-icon">
                                    <i class="ion ion-ios-speedometer-outline">
                                    </i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">worked</span>
                                    <span class="info-box-number">108Days</span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 100%">
                                        </div>
                                    </div>
                                    <span class="progress-description">
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                            <div class="info-box bg-green">
                                <span class="info-box-icon">
                                    <i class="ion ion-ios-people-outline">
                                    </i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Users</span>
                                    <span class="info-box-number">9643</span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 100%">
                                        </div>
                                    </div>
                                    <span class="progress-description">
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                            <div class="info-box bg-red">
                                <span class="info-box-icon">
                                    <i class="ion ion-ios-cloud-upload-outline">
                                    </i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">deposit</span>
                                    <span class="info-box-number">7811</span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 100%">
                                        </div>
                                    </div>
                                    <span class="progress-description">
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                            <!-- /.info-box -->
                            <div class="info-box bg-aqua">
                                <span class="info-box-icon">
                                    <i class="ion-ios-chatbubble-outline">
                                    </i>
                                </span>
                                <div class="info-box-content">
                                    <p>You have bonus for start 0.000698 BTC Just make purchase of a bonus package</p>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->

                            <!-- /.col -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                            <a href="javascript:void(0)" class="uppercase">View All Pages</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                </div>
                <!-- /.box -->
                <!-- Groups LIST -->
                <div class="col-md-4">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title"><i class="fa fa-group"> </i> Groups 10</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <ul class="products-list product-list-in-box">
                                <li class="item">
                                    <div class="product-img">
                                        <img src="$group->image->path}}" alt="Product Image">
                                    </div>
                                    <div class="product-info">
                                        <a href="javascript:void(0)" class="product-title">Title</a>
                                        <a href="/user/profile/$group->user->id}}">
                                            <span class="label label-warning pull-right">
                                                User name
                                            </span>
                                        </a>
                                        <span class="product-description">
                                            asdsad
                                        </span>
                                    </div>
                                </li>
                                <!-- /.item -->
                            </ul>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                            <a href="javascript:void(0)" class="uppercase">View All Groups</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                </div>
                <!-- /.box -->
            </div>
             <!--/Row-->

            <aside class="bg-light lter b-l aside-md hide" id="notes">
                <div class="wrapper">Notification</div>
            </aside>
       </section>
    </section>

  @endsection
