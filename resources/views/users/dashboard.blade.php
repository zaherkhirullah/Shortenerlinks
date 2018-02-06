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
                    <div class="box-header with-border text-center">
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
                      <!-- /.box-body -->
                    <div class="box-footer text-center">
                        <a href="/user/links" class="uppercase">View All links</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
              
            </div>
            <!-- /.col-md-12  -->
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border text-center">
                        <h3 class="box-title">
                            <i class="fa fa-file-o"> 
                            </i> Your Files 15
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
                        <a href="/user/files" class="uppercase">View All Files</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.col-md-12  -->
            <div>
                <div class="col-md-6">
                    <div class="box box-info">
                        <div class="box-header with-border text-center">
                            <h3 class="box-title ">
                                <i class="fa fa-leaf">
                                </i> used Space  15
                            </h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                    <i class="fa fa-minus"></i>
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
                        <div class="box-header with-border text-center">
                            <h3 class="box-title">
                                 <i class="fa fa-link"> </i> links
                                  <sup>&</sup>
                                  <sub>&</sub>
                                  <sup>&</sup>
                                 <i class="fa fa-file-o"> </i>  Files
                                 
                            </h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                    <i class="fa fa-minus"></i>
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
            <!--/col-md-12 -->

    @endsection
