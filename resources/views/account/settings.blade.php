@extends('layouts.accountLayout')

@section('content')

<section class="vbox">
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<section class="scrollable padder">
<div class="row wrapper text-center">
    <div class="col-xs-6 col-md-3 b-r b-light">
        <span class="h3 text-danger font-bold m-t m-b-xs block">3</span>
        <small class="h5 text-muted m-b block">Views</small>
    </div>
    <div class="col-xs-6 col-md-3 b-r b-light">
        <span class="h3 text-danger font-bold m-t m-b-xs block">$0.0045</span>
        <small class="h5 text-muted m-b block">Earnings</small>
    </div>
    <div class="col-xs-6 col-md-3 b-r b-light">
        <span class="h3 text-danger font-bold m-t m-b-xs block">$1.5</span>
        <small class="h5 text-muted m-b block">eCPM</small>
    </div>
    <div class="col-xs-6 col-md-3">
        <span class="h3 text-success font-bold m-t m-b-xs block">$0.0135</span>
        <small class="h5 text-muted m-b block">Total Available Earnings</small>
    </div>
</div>
<section class="panel no-borders">
    <header class="panel-heading">
        <div class="pull-right m-t-xs">
            <div class="btn-group dropdown-link">
                <button class="btn btn-sm btn-rounded btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="dropdown-label">January 2018</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu dropdown-select" data-pjax="true">
                    <li><a href="/manage/home/stats/2018/1">January 2018</a></li>
                    <li><a href="/manage/home/stats/2017/12">December 2017</a></li>
                    <li><a href="/manage/home/stats/2017/11">November 2017</a></li>
                    <li><a href="/manage/home/stats/2017/10">October 2017</a></li>
                    <li><a href="/manage/home/stats/2017/9">September 2017</a></li>
                    <li><a href="/manage/home/stats/2017/8">August 2017</a></li>
                </ul>
            </div>
        </div>
        <h4 class="font-thin">Statistics</h4>
    </header>
    <div class="panel-body">
        <div id="home-stats" class="m-b-xl hidden-xs"
        style="height: 250px; padding: 0px; position: relative;">
        <canvas class="flot-base" width="1050" height="275" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 955px; height: 250px;">

        </canvas>

        <div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);">
        
    <div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;">
    @for($i =0 ; $i< 31 ;$i++)
      $j=9;
      $j = $j+31;
    <div style="position: absolute; max-width: 30px; top: 239px; font-style: normal; font-variant: normal; font-weight: 400; font-stretch: normal; font-size: 12px; line-height: 11.5px; font-family: Raleway, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Microsoft JhengHei&quot;, &quot;Microsoft YaHei&quot;, Helvetica, Arial, sans-serif; color: rgb(105, 118, 149); left: {{$j +31}}px; text-align: center;">
        {{$i}}
      </div>

    @endfor

     </div>
       </div>

            <div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div style="position: absolute; top: 229px; font-style: normal; font-variant: normal; font-weight: 400; font-stretch: normal; font-size: 12px; line-height: 11.5px; font-family: Raleway, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Microsoft JhengHei&quot;, &quot;Microsoft YaHei&quot;, Helvetica, Arial, sans-serif; color: rgb(157, 163, 169); left: 0px; text-align: right;">0
            </div>

            <div style="position: absolute; top: 172px; font-style: normal; font-variant: normal; font-weight: 400; font-stretch: normal; font-size: 12px; line-height: 11.5px; font-family: Raleway, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Microsoft JhengHei&quot;, &quot;Microsoft YaHei&quot;, Helvetica, Arial, sans-serif; color: rgb(157, 163, 169); left: 0px; text-align: right;">1
            </div>

            <div style="position: absolute; top: 116px; font-style: normal; font-variant: normal; font-weight: 400; font-stretch: normal; font-size: 12px; line-height: 11.5px; font-family: Raleway, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Microsoft JhengHei&quot;, &quot;Microsoft YaHei&quot;, Helvetica, Arial, sans-serif; color: rgb(157, 163, 169); left: 0px; text-align: right;">2
            </div>

            <div style="position: absolute; top: 59px; font-style: normal; font-variant: normal; font-weight: 400; font-stretch: normal; font-size: 12px; line-height: 11.5px; font-family: Raleway, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Microsoft JhengHei&quot;, &quot;Microsoft YaHei&quot;, Helvetica, Arial, sans-serif; color: rgb(157, 163, 169); left: 0px; text-align: right;">3
            </div>

            <div style="position: absolute; top: 3px; font-style: normal; font-variant: normal; font-weight: 400; font-stretch: normal; font-size: 12px; line-height: 11.5px; font-family: Raleway, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Microsoft JhengHei&quot;, &quot;Microsoft YaHei&quot;, Helvetica, Arial, sans-serif; color: rgb(157, 163, 169); left: 0px; text-align: right;">4</div></div></div><canvas class="flot-overlay" width="1050" height="275" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 955px; height: 250px;"></canvas><div class="legend"><div style="position: absolute; width: 45px; height: 15px; top: 13px; right: 13px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div><table style="position:absolute;top:13px;right:13px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(48,160,235);overflow:hidden"></div></div></td><td class="legendLabel">Views</td></tr></tbody></table></div></div>
            <div id="links">
                <table class="table table-striped table-flip-scroll cf">
                    <thead class="cf">
                        <tr>
                            <th>Link</th>
                            <th class="hidden-xs">Created</th>
                            <th>Views</th>
                            <th>Earnings</th>
                            <th class="hidden-xs">COPY LINK</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <a href="/fpyTut" class="h5 text-danger" target="_blank"><strong>/fpyTut</strong></a>
                                <small class="text-muted block">http://facebook.com/groups/ARI...</small>
                            </td>
                            <td class="v-middle hidden-xs">2017-08-18</td>
                            <td class="v-middle">2</td>
                            <td class="v-middle text-danger">$0.003</td>
                            <td class="v-middle hidden-xs">
                                <div class="pos-rlt">
                                    <button class="btn btn-copy text-danger" data-clipboard-text="/fpyTut" data-toggle="button">
                                        <span class="text">
                                            <i class="fa fa-heart-o"></i> COPY
                                        </span>
                                        <span class="text-active">
                                            <i class="fa fa-check"></i> COPY
                                        </span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="/pxfItW" class="h5 text-danger" target="_blank"><strong>/pxfItW</strong></a>
                                <small class="text-muted block">http://http:/lola.c</small>
                            </td>
                            <td class="v-middle hidden-xs">2017-09-03</td>
                            <td class="v-middle">1</td>
                            <td class="v-middle text-danger">$0.0015</td>
                            <td class="v-middle hidden-xs">
                                <div class="pos-rlt">
                                    <button class="btn btn-copy text-danger" data-clipboard-text="/pxfItW" data-toggle="button">
                                        <span class="text">
                                            <i class="fa fa-heart-o"></i> COPY
                                        </span>
                                        <span class="text-active">
                                            <i class="fa fa-check"></i> COPY
                                        </span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="btn-group padder m-b-sm ajax-pager">
                </div>
            </div>
        </div>
    </section>
</section>
</section>
</section>

<aside class="bg-light lter b-l aside-md hide" id="notes">
<div class="wrapper">Notification</div>
</aside>
            

@endsection
