@extends('layouts.layout')
<!-- <?php
// $this->assign('title', __('Dashboard'));
// $this->assign('description', '');
// $this->assign('content_title', __('Dashboard'));
?> -->
@section('content')

<section class="scrollable padder">
    <section class="content">
        <div class="row">
        
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <i class="fa fa-link">
                        </i> Your Links 15
                    </h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
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
                                    <span class="sum color1">0</span>
                                    <sup style="font-size: 25px">

                                    </sup>
                                </h3>
                                <p>Views Today</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-eye"> </i>
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
                                    <span class="sum color1">0</span>
                                    <sup style="font-size: 20px"></sup>
                                </h3>
                                <p>Total Views</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-ios-eye-outline">
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
                                    <span class="sum color1">0</span>
                                    <sup style="font-size: 25px">$</sup>
                                </h3>
                                <p>Total Earnings</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-social-usd">
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
                                    <span class="sum color1">0</span>
                                    <sup style="font-size: 25px"></sup>
                                </h3>
                                <p>Average CPM</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-usd">
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
                        <i class="fa fa-file-o"> 
                        </i> Your Files 15
                    </h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
<!--  <button type="button" class="btn btn-box-tool" data-widget="remove">
<i class="fa fa-times"></i>
</button> -->
</div>
</div>
<!-- /.box-header -->
<div class="box-body" style="display: block;">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-teal">
            <div class="inner">
                <h3>
                    <span class="sum color1">0</span>
                    <sup style="font-size: 25px">

                    </sup>
                </h3>
                <p>Downloads Today</p>
            </div>
            <div class="icon">
                <i class="ion ion-ios-cloud-download">
                </i>
            </div>
            <a href="operation?add=CASHIN" class="small-box-footer">More info 
                <i class="fa fa-arrow-circle-right">
                </i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>
                    <span class="sum color1">0</span>
                    <sup style="font-size: 25px"></sup>
                </h3>
                <p>Total Downloads</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-download">
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
                <h3>
                    <span class="sum color1">0.00</span>
                    <sup style="font-size: 25px">$</sup>
                </h3>
                <p>Total Earnings</p>
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
        <div class="small-box bg-red-active">
            <div class="inner">
                <h3>
                    <span class="url color2">0</span>
                    <sup style="font-size: 25px"></sup>
                </h3>
                <p>Average CPM</p>
            </div>
            <div class="icon">
                <i class="fa fa-usd">
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
    <a href="javascript:void(0)" class="uppercase">View All Files</a>
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
                        <i class="ion ion-ios-briefcase">
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
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow-active">
                    <div class="inner">
                        <h3>
                            <span class="sum color1">0.00</span>
                            <sup style="font-size: 25px">$</sup>  </h3>
                            <p>Referral Earnings</p>
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
<script>
    jQuery(document).ready(function () {
        new Morris.Line({
            element: 'chart_div',
            resize: true,
            data: [
            {date: "2018-01-01", views: 0},
            {date: "2018-01-02", views: 0},
            {date: "2018-01-03", views: 0},
            {date: "2018-01-04", views: 0},
            {date: "2018-01-05", views: 0},
            {date: "2018-01-06", views: 0},
            {date: "2018-01-07", views: 0},
            {date: "2018-01-08", views: 0},
            {date: "2018-01-09", views: 0},
            {date: "2018-01-10", views: 0},
            {date: "2018-01-11", views: 0},
            {date: "2018-01-12", views: 0},
            {date: "2018-01-13", views: 0},
            {date: "2018-01-14", views: 0},
            {date: "2018-01-15", views: 0},
            {date: "2018-01-16", views: 0},
            {date: "2018-01-17", views: 0},
            {date: "2018-01-18", views: 0},
            {date: "2018-01-19", views: 0},
            {date: "2018-01-20", views: 0},
            {date: "2018-01-21", views: 0},
            {date: "2018-01-22", views: 0},
            {date: "2018-01-23", views: 0},
            {date: "2018-01-24", views: 0},
            {date: "2018-01-25", views: 0},
            {date: "2018-01-26", views: 0},
            {date: "2018-01-27", views: 0},
            {date: "2018-01-28", views: 0},
            {date: "2018-01-29", views: 0},
            {date: "2018-01-30", views: 0},
            {date: "2018-01-31", views: 0},
            ],
            xkey: 'date',
            xLabels: 'day',
            ykeys: ['views'],
            labels: ['Views'],
            lineColors: ['#3c8dbc'],
            lineWidth: 2,
            hideHover: 'auto',
            smooth: false
        })
    })
</script>
@endsection
