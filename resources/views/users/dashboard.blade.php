@extends('layouts.layout')
<!-- <?php
// $this->assign('title', __('Dashboard'));
// $this->assign('description', '');
// $this->assign('content_title', __('Dashboard'));
?> -->
@section('content')

<center>
    <code><b class="text-success" >Today :</b> {{$DayTime}}</code> 
    <code><b class="text-success" >Time  :</b> <span id="Time">{{$NowTime}}</span></code>
</center>
<section class="scrollable padder">
<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box panel">
            <div class="box-header with-border text-center">
                <h3 class="box-title">
                    <i class="fa fa-briefcase"></i>
                    @lang('lang.statistics')
                    <i class="fa fa-area-chart"></i>
                </h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="display: block;">
                    <div class="box box-info col-md-2  col-sm-6 col-xs-12">
                        <!-- small box -->
                        <div class="panel-body">
                            <div class="inner">
                                <p  class="text-center"> @lang('lang.today_downloads') 
                                    <span class="pull-right  text-danger"> {{$TodayFileDownloads}}</span>
                                </p>
                                <p  class="text-center">eCPM
                                        <span class="pull-right text-danger">: 0$</span >
                                </p>
                                <p  class="text-center">@lang('lang.today_earnings') 
                                        <span class="pull-right text-info"> {{$TodayFileEarnings}}$</span >
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="box box-warning col-md-2  col-sm-6 col-xs-12">
                        <!-- small box -->
                        <div class="panel-body">
                            <div class="inner">
                                <p  class="text-center">@lang('lang.today_views') 
                                    <span class="pull-right text-danger"> {{$TodayLinkViews}}</span>
                                </p>
                                <p  class="text-center">eCPM
                                    <span class="pull-right  text-danger">: 0$</span >
                                </p>
                                <p  class="text-center">@lang('lang.today_earnings') 
                                    <span class="pull-right text-warning"> {{$TodayLinkEarnings}}$</span >
                                </p>
                              </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="box box-info col-md-2  col-sm-6 col-xs-12">
                        <!-- small box -->
                        <div class="panel-body">
                            <div class="inner">
                                <p class="text-center">@lang('lang.total_downloads')<br>
                                    <span class="text-danger "> {{$TotalFileDownloads}}</span >
                                    <br>
                                    @lang('lang.total_file_earnings') 
                                    <span class="text-danger text-center"> {{$TotalFileEarnings}}$</span >
                                </p>    
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="box box-warning col-md-2  col-sm-6 col-xs-12">
                        <!-- small box -->
                        <div class="panel-body">
                            <div class="inner">
                                <p class="text-center">@lang('lang.total_views') <br>
                                    <span class="text-danger"> {{$TotalLinkViews}}</span >
                                    <br>
                                    @lang('lang.total_link_earnings') 
                                    <span class="text-danger text-center"> {{$TotalLinkEarnings}}$</span >
                                </p> 
                            </div>
                            
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="box box-danger col-md-2 col-sm-6 col-xs-12">
                        <!-- small box -->
                        <div class="panel-body inner">
                            <p class="text-center">@lang('lang.referrals_earnings')  <br>
                                <h3>
                                    <div class="text-danger text-center">{{$Referral_MyEarnings}} $</div > 
                                </h3>
                            </p>    
                        </div>
                    </div>
                    {{--  <!-- ./col -->
                    <div class="panel col-md-3 col-xs-12 ">
                        <!-- small box -->
                        <div class="inner topp">
                            <p class="text-center">
                                <span class="text-danger text-center"> = </span >
                            </p>    
                        </div>
                    </div>  --}}
                    <!-- ./col -->
                    <div class="box box-success col-md-2 col-sm-6 col-xs-12">
                        <div class="panel-body inner">
                            <p class="text-center"> @lang('lang.total_avilable_earnings')<br>
                                <h4>
                                    <div class="text-center text-success"> {{$TotalEarnings}} $</div >
                                </h4>
                            </p>    
                        </div>
                    </div>
                    <!-- ./col -->
            </div>
            <!-- /.box-body -->
            <!-- /.box-footer -->
        </div>     
    </div>
    <div class="col-md-4">
        <div class="box panel">
            <div class="box-header with-border text-center">
                <h3 class="box-title ">
                    <i class="fa fa-cloud"></i> 
                    @lang('lang.used_space')  
                    <i class="fa fa-cloud"></i>

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
                        <span>@lang('lang.view')  @lang('lang.my_files') </span><i class="fa fa-chevron-right"></i>
                    </div>
                </a>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.col-md-4  -->
    <div class="col-md-8">
        <div class="box panel">
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
    <!-- /.col-md-8  -->
    <div class="col-md-8">
        <div id="pop-div"></div>
        {{--  // With Lava class alias  --}}
        <?=$lava->render('GeoChart', 'visitors', 'pop-div') ?>
    </div>
    <div class="col-md-12 row"><br></div>
    <!-- /.col-md-8  -->
    <div class="col-md-6">
        <div class="box panel">
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

                <div class="col-lg-6  col-md-6 col-xs-6">
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
                        <a href="#" class="small-box-footer">More info
                            <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-6  col-md-6 col-xs-6">
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
                        <a href="#" class="small-box-footer">More info 
                            <i class="fa fa-arrow-circle-right"> </i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-6  col-md-6 col-xs-6">
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
                        <a href="#" class="small-box-footer">More info 
                            <i class="fa fa-arrow-circle-right">
                            </i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-6 col-md-6 col-xs-6">
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
                        <a href="#" class="small-box-footer">More info 
                            <i class="fa fa-arrow-circle-right">
                            </i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-12 col-md-12 col-xs-12">
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
                        <a href="#" class="small-box-footer">More info
                            <i class="fa fa-arrow-circle-right">
                            </i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
                <!-- /.box-body -->
            <div class="box-footer text-center">
                <a href="{{route('link.index')}}" class="uppercase">@lang('lang.view') @lang('lang.all') @lang('lang.Links')</a>
            </div>
            <!-- /.box-footer -->
        </div>
        
    </div>
    <!-- /.col-md-12  -->
    <div class="col-md-6">
        <div class="box panel">
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
                <div class="col-lg-6 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-teal">
                        <div class="inner">
                            <h3>
                                <span class="sum color1">{{$TodayFileDownloads}} </span>
                                <sup style="font-size: 25px">

                                </sup>
                            </h3>
                            <p class="hidden-xs">@lang('lang.today_downloads') </p>
                            <p class="hidden-sm hidden-md hidden-lg">@lang('lang.today') </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-cloud-download">
                            </i>
                        </div>
                        <a href="#" class="small-box-footer">More info 
                            <i class="fa fa-arrow-circle-right">
                            </i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6  col-md-6 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>
                                <span class="sum color1">{{$TotalFileDownloads}} </span>
                                <sup style="font-size: 25px"></sup>
                            </h3>
                            <p>@lang('lang.total_downloads') </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-download">
                            </i>
                        </div>
                        <a href="#" class="small-box-footer">More info 
                            <i class="fa fa-arrow-circle-right">
                            </i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-6  col-md-6 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-olive">
                        <div class="inner">
                            <h3>
                                <span class="sum color1">{{$TodayFileEarnings}} </span>
                                <sup style="font-size: 25px">$</sup>
                            </h3>
                            <p>@lang('lang.today_earnings') </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-cog-outline"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info
                            <i class="fa fa-arrow-circle-right"> </i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <!-- ./col -->
                <div class="col-lg-6 col-md-6 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-olive">
                        <div class="inner">
                            <h3>
                                <span class="sum color1">{{$TotalFileEarnings}} </span>
                                <sup style="font-size: 25px">$</sup>
                            </h3>
                            <p>@lang('lang.total_earnings') </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-cog-outline"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info
                            <i class="fa fa-arrow-circle-right"> </i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->

                <div class="col-lg-12 col-md-12 col-xs-12">
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
                        <a href="#" class="small-box-footer">More info
                            <i class="fa fa-arrow-circle-right">
                            </i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
                <a href="{{route('file.index')}}" class="uppercase">@lang('lang.view') @lang('lang.all') @lang('lang.Files') </a>
            </div>
            <!-- /.box-footer -->
        </div>
        <!-- /.box-body -->
    </div>
        <!-- /.col-md-12  -->
    
   
<script>
var myVar = setInterval(myTimer, 1000);
function myTimer() {
var d = new Date();
document.getElementById("Time").innerHTML = d.toLocaleTimeString();
}
</script>
@endsection