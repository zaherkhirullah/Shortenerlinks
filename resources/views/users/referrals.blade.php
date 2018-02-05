@extends('layouts.layout')

@section('content')

<section class="col-md-8">
    <section class="vbox lter box box-info">
        <header class="box-header with-border">
            <h3 class="box-title">
                <i class="fa fa-users">
                </i> Referals 

            </h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove">
                    <i class="fa fa-times"></i>
                </button>
            </div>
        </header>
        <!-- /.box-header -->
        <section class="box-body scrollable hover">
            <section class="panel no-borders">
                <header class="panel-heading">
                    <h4 class="font-thin">Referrals</h4>
                </header>
                <div class="panel-body">
                    <div class="h5">
                        The <b>ouo.io</b> referral program is a great way to spread the word of this great service and to earn even more money with your short links! Refer friends and receive 20% of their earnings for life!
                    </div>
                    <div class="well m-t">
                        <code>
                    @if(Auth::user()->affiliate_id)
                    {{url('/register').'/?ref='.Auth::user()->affiliate_id}}
                    @endif
                        </code>
                    </div>
                    <h4 class="font-thin m-t-xl">Referral <b>Banners</b></h4>
                    <div class="nav-tabs-alt">
                        <ul class="nav nav-tabs nav-justified">
                            <li class=""><a href="#720x90" data-toggle="tab">720 x 90</a></li>
                            <li class=""><a href="#480x60" data-toggle="tab">480 x 60</a></li>
                            <li class=""><a href="#336x280" data-toggle="tab">336 x 280</a></li>
                            <li class="active"><a href="#300x250" data-toggle="tab">300 x 250</a></li>
                            <li class=""><a href="#250x250" data-toggle="tab">250 x 250</a></li>
                            <li class=""><a href="#160x600" data-toggle="tab">160 x 600</a></li>
                        </ul>
                        <div class="tab-content wrapper-md">
                            <div id="720x90" class="tab-pane">
                                <img class="center-block m-b" src="https://ouo.io/images/banners/r1.jpg" style="display: none !important;">
                                <pre>&lt;!-- Start of ouo.io banner code --&gt;<br>&lt;a href="{{url('/register').'/?ref='.Auth::user()->affiliate_id}}"&gt;&lt;img src="http://ouo.io/images/banners/r1.jpg" title="ouo.io - Make short links and earn the biggest money" /&gt;&lt;/a&gt;<br>&lt;!-- End of ouo.io banner code --&gt;</pre>
                            </div>
                            <div id="480x60" class="tab-pane">
                                <img class="center-block m-b" src="https://ouo.io/images/banners/r2.jpg" style="display: none !important;">
                                <pre>&lt;!-- Start of ouo.io banner code --&gt;<br>&lt;a href="{{url('/register').'/?ref='.Auth::user()->affiliate_id}}"&gt;&lt;img src="http://ouo.io/images/banners/r2.jpg" title="ouo.io - Make short links and earn the biggest money" /&gt;&lt;/a&gt;<br>&lt;!-- End of ouo.io banner code --&gt;</pre>
                            </div>
                            <div id="336x280" class="tab-pane">
                                <img class="center-block m-b" src="https://ouo.io/images/banners/r3.jpg" style="display: none !important;">
                                <pre>&lt;!-- Start of ouo.io banner code --&gt;<br>&lt;a href="{{url('/register').'/?ref='.Auth::user()->affiliate_id}}"&gt;&lt;img src="http://ouo.io/images/banners/r3.jpg" title="ouo.io - Make short links and earn the biggest money" /&gt;&lt;/a&gt;<br>&lt;!-- End of ouo.io banner code --&gt;</pre>
                            </div>
                            <div id="300x250" class="tab-pane active">
                                <img class="center-block m-b" src="https://ouo.io/images/banners/r4.jpg" style="display: none !important;">
                                <pre>&lt;!-- Start of ouo.io banner code --&gt;<br>&lt;a href="{{url('/register').'/?ref='.Auth::user()->affiliate_id}}"&gt;&lt;img src="http://ouo.io/images/banners/r4.jpg" title="ouo.io - Make short links and earn the biggest money" /&gt;&lt;/a&gt;<br>&lt;!-- End of ouo.io banner code --&gt;</pre>
                            </div>
                            <div id="250x250" class="tab-pane">
                                <img class="center-block m-b" src="https://ouo.io/images/banners/r5.jpg" style="display: none !important;">
                                <pre>&lt;!-- Start of ouo.io banner code --&gt;<br>&lt;a href="{{url('/register').'/?ref='.Auth::user()->affiliate_id}}"&gt;&lt;img src="http://ouo.io/images/banners/r5.jpg" title="ouo.io - Make short links and earn the biggest money" /&gt;&lt;/a&gt;<br>&lt;!-- End of ouo.io banner code --&gt;</pre>
                            </div>
                            <div id="160x600" class="tab-pane">
                                <img class="center-block m-b" src="https://ouo.io/images/banners/r6.jpg" style="display: none !important;">
                                <pre>&lt;!-- Start of ouo.io banner code --&gt;<br>&lt;a href="{{url('/register').'/?ref='.Auth::user()->affiliate_id}}"&gt;&lt;img src="http://ouo.io/images/banners/r6.jpg" title="ouo.io - Make short links and earn the biggest money" /&gt;&lt;/a&gt;<br>&lt;!-- End of ouo.io banner code --&gt;</pre>
                            </div>
                        </div>
                    </div>
                    <h4 class="font-thin m-t-xl"><b>My</b> Referrals</h4>
                    <table class="table table-striped table-flip-scroll cf">
                        <thead class="cf">
                            <tr>
                                <th>Username</th>
                                <th>Earnings</th>
                                <th>My Earnings</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>benrkia</td>
                                <td class="v-middle hidden-xs">$0.00000</td>
                                <td class="v-middle text-danger">$0
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="btn-group padder m-b-sm ajax-pager">
                    </div>
                </div>
            </section>
        </section>
    </section>
</section>
@endsection
