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
                <section>  
                    <div class="row">  
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
                </div>
            </section>
            <div class="col-md-12">
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
                                    <a href="#" class="small-box-footer">More info
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
                                    <a href="#" class="small-box-footer">More info 
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
                                    <a href="#" class="small-box-footer">More info 
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
                                    <a href="#" class="small-box-footer">More info 
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
                <div class="col-md-12">
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
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-teal">
                                    <div class="inner">
                                        <h3>
                                            <span class="sum color1">{{$TodayFileDownloads}} </span>
                                            <sup style="font-size: 25px">
            
                                            </sup>
                                        </h3>
                                        <p>@lang('lang.today_downloads') </p>
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
                            <div class="col-lg-3 col-xs-6">
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
                            <div class="col-lg-3 col-xs-6">
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
                            <div class="col-lg-3 col-xs-6">
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
    <div class="col-md-8">
            <div id="pop-div"></div>
            {{--  // With Lava class alias  --}}
            <?=$lava->render('GeoChart', 'visitors', 'pop-div') ?>
    </div>
</div>
<aside class="bg-light lter b-l aside-md hide" id="notes">
    <div class="wrapper">Notification</div>
</aside>


@endsection
