    @extends('layouts.layout')
    <!-- <?php
    // $this->assign('title', __('Dashboard'));
    // $this->assign('description', '');
    // $this->assign('content_title', __('Dashboard'));
    ?> -->
    @section('content')
    <style>
    .small-box1{
        box-shadow :5px;
        border-right:1px solid #eee;
        padding:-2px;
        margin:-2px;

    }
    .small-box1 p{
        padding:5px;
    }
    .topp{
        margin-top:40px;
    }
    .topp p>span{
        margin-top:25px;
    }
    .boxx{
        width:auto;
    }
    </style>
        <!-- <code>
            Today : {{$DayTime}}
        </code> -->

    <center>
    <code >Time  : <span id="Time">{{$NowTime}}</span></code>
    </center>
    <section class="scrollable padder">
    <section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border text-center">
                    <h3 class="box-title">
                        <i class="fa fa-link"></i>
                    </h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="display: block;">

                        <div class="boxx col-xs-6">
                            <!-- small box -->
                            <div class="small-box1">
                                <div class="inner">
                                    <p>@lang('lang.today_downloads') 
                                         <b class="text-danger pull-right">: 
                                             {{$TodayFileDownloads}}
                                        </b>
                                    </p>
                                    <p>eCPM <b class="text-danger pull-right">: 0$</b></p>
                                    <p>@lang('lang.today_earnings') <b class="text-danger pull-right">: {{$TodayFileEarnings}}$</b></p>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="boxx col-xs-6">
                            <!-- small box -->
                            <div class="small-box1">
                                <div class="inner">
                                    <p>@lang('lang.today_views')  <b class="text-danger pull-right">: {{$TodayLinkViews}}</b></p>
                                    <p>eCPM <b class="text-danger pull-right">: 0$</b></p>
                                    <p>@lang('lang.today_earnings')  <b class="text-danger pull-right">: {{$TodayLinkEarnings}}$</b></p>
                                </div>
                                
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="boxx col-xs-6">
                            <!-- small box -->
                            <div class="small-box1">
                                <div class="inner">
                                    <p class="text-center">@lang('lang.total_downloads')<br>
                                        <span class="text-danger"> {{$TotalFileDownloads}}</span >
                                    </p>
                                    <p class="text-center">@lang('lang.total_file_earnings') <br>
                                        <span class="text-danger text-center"> {{$TotalFileEarnings}}$</span >
                                    </p>    
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="boxx col-xs-6">
                            <!-- small box -->
                            <div class="small-box1">
                                <div class="inner">
                                    <p class="text-center">@lang('lang.total_views') <br>
                                        <span class="text-danger"> {{$TotalLinkViews}}</span >
                                    </p>
                                    <p class="text-center">@lang('lang.total_link_earnings') <br>
                                        <span class="text-danger text-center"> {{$TotalLinkEarnings}}$</span >
                                    </p> 
                                </div>
                                
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="boxx col-xs-6">
                            <!-- small box -->
                            <div class="inner topp">
                                <p class="text-center">@lang('lang.referrals_earnings')  <br>
                                    <span class="text-danger text-center">{{$Referral_MyEarnings}} $</span > 
                                </p>    
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="boxx col-xs-6">
                            <!-- small box -->
                            <div class="inner topp">
                                <p class="text-center">
                                    <span class="text-danger text-center"> = </span >
                                </p>    
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="boxx col-xs-6">
                            <div class="inner topp">
                                <p class="text-center"> @lang('lang.total_avilable_earnings')<br>
                                    <span class="text-success"> {{$TotalEarnings}} $</span >
                                </p>    
                            </div>
                        </div>
                        <!-- ./col -->
                    
                </div>
                    <!-- /.box-body -->
                
                <!-- /.box-footer -->
            </div>
            
        </div>

        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border text-center">
                    <h3 class="box-title">
                        <i class="fa fa-link">
                        </i>@lang('lang.all') @lang('lang.Links') 
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
                                    <span class="sum color1">{{$TodayLinkViews}}</span>
                                    <sup style="font-size: 25px">

                                    </sup>
                                </h3>
                                <p>@lang('lang.today_views') </p>
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
                                    <span class="sum color1">{{$TotalLinkViews}}</span>
                                    <sup style="font-size: 20px"></sup>
                                </h3>
                                <p>@lang('lang.total_views') </p>
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
                                    <span class="sum color1">{{$TodayLinkEarnings}}</span>
                                    <sup style="font-size: 25px">$</sup>
                                </h3>
                                <p>@lang('lang.today_earnings') </p>
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
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>
                                    <span class="sum color1">{{$TotalLinkEarnings}}</span>
                                    <sup style="font-size: 25px">$</sup>
                                </h3>
                                <p>@lang('lang.total_earnings') </p>
                                
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
                    <a href="/user/links" class="uppercase">@lang('lang.view') @lang('lang.all') @lang('lang.links')</a>
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
                        </i> @lang('lang.all') @lang('lang.Files') 
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
                                    <span class="sum color1">{{$TodayFileDownloads}} </span>
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
                                    <span class="sum color1">{{$TotalFileDownloads}} </span>
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
                                    <span class="sum color1">{{$TodayFileEarnings}} </span>
                                    <sup style="font-size: 25px">$</sup>
                                </h3>
                                <p>Today Earnings</p>
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
                    
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-olive">
                            <div class="inner">
                                <h3>
                                    <span class="sum color1">{{$TotalFileEarnings}} </span>
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
                    <a href="/user/files" class="uppercase">@lang('lang.view') @lang('lang.all') Files</a>
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.col-md-12  -->
        <div>
            <div class="col-md-4">
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
                        <div id="chart-div"></div>
                            {{--  // With Lava class alias  --}}
                         {!! $lava->render('DonutChart', 'IMDB', 'chart-div') !!} 
                        <a href="{{route('file.index')}}">
                            <div class="footer-section">
                                <span>مشاهدة ملفاتي</span><i class="fa fa-chevron-right"></i>
                            </div>
                        </a>
            </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.col-md-6  -->
            <div class="col-md-8">
                <div class="box box-success">
                    <div class="box-header with-border text-center">
                        <h3 class="box-title">
                                <i class="fa fa-link"> </i> @lang('lang.Links')
                                <sup>&</sup>
                                <sub>&</sub>
                                <sup>&</sup>
                                @lang('lang.Files')  <i class="fa fa-file-o"> </i> 
                                
                        </h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                            
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" style="display: block;">
                            <div id="temps_div"></div>
                            {{--  // With Lava class alias  --}}
                            <?= $lava->render('LineChart', 'Temps', 'temps_div') ?>
                    </div>
                    <!-- /.box-body -->

                </div>
                <!-- /.box -->
            </div>
            <!-- /.col-md-6  -->
            <div class="col-md-8">
                    <div id="pop-div"></div>
                    {{--  // With Lava class alias  --}}
                    <?=$lava->render('GeoChart', 'Popularity', 'pop-div') ?>
            </div>
        </div> 
        
       
    <script>
    var myVar = setInterval(myTimer, 1000);

    function myTimer() {
    var d = new Date();
    document.getElementById("Time").innerHTML = d.toLocaleTimeString();
    }
    </script>
    @endsection
