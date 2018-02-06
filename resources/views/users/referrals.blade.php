@extends('layouts.layout')

@section('content')

<section class="col-md-8">
    <section class="vbox lter box box-info">

        <header class="box-header with-border text-center">
            <h3 class="box-title">
                <i class="fa fa-users">
                </i> Referals 
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
            <section>
                <div class="h5">
                    The <b>{{url('/')}}</b> referral program is a great way to spread the word of this great service and to earn even more money with your short links! Refer friends and receive 20% of their earnings for life!
                </div>
                <div class="well m-t text-center">
                    <code class="text-primary">
                        @if(Auth::user()->affiliate_id)
                        {{url('/register').'/?ref='.Auth::user()->affiliate_id}}
                        @endif
                    </code>
                </div>
<section class="text-center">
      <h4 class="font-thin m-t-xl text-primary">Referral Banners</h4>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
            Launch Referral Banners
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Referral Banners</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="nav-tabs-alt">
                            <ul class="nav nav-tabs">
                                <li class="">
                                    <a href="#720x90" data-toggle="tab">720 x 90</a>
                                </li>
                                <li class="">
                                    <a href="#480x60" data-toggle="tab">480 x 60</a>
                                </li>
                                <li class="">
                                    <a href="#336x280" data-toggle="tab">336 x 280</a>
                                </li>
                                <li class="active">
                                    <a href="#300x250" data-toggle="tab">300 x 250</a>
                                </li>
                                <li class="">
                                    <a href="#250x250" data-toggle="tab">250 x 250</a>
                                </li>
                                <li class="">
                                    <a href="#160x600" data-toggle="tab">160 x 600</a>
                                </li>
                            </ul>
                            <div class="tab-content wrapper-md">
                                <div id="720x90" class="tab-pane">
                                    <img class="center-block m-b" src="https://{{url('/')}}/images/banners/r1.jpg" style="display: none !important;">
                                    <pre>&lt;!-- Start of 720x90 {{url('/')}} banner code --&gt;<br>&lt;a href="{{url('/register').'/?ref='.Auth::user()->affiliate_id}}"&gt;&lt;img src="http://{{url('/')}}/images/banners/r1.jpg" title="{{url('/')}} - Make short links and earn the biggest money" /&gt;&lt;/a&gt;<br>&lt;!-- End of 720x90 {{url('/')}} banner code --&gt;</pre>
                                </div>
                                <div id="480x60" class="tab-pane">
                                    <img class="center-block m-b" src="https://{{url('/')}}/images/banners/r2.jpg" style="display: none !important;">
                                    <pre>&lt;!-- Start of 480x60 {{url('/')}} banner code --&gt;<br>&lt;a href="{{url('/register').'/?ref='.Auth::user()->affiliate_id}}"&gt;&lt;img src="http://{{url('/')}}/images/banners/r2.jpg" title="{{url('/')}} - Make short links and earn the biggest money" /&gt;&lt;/a&gt;<br>&lt;!-- End of 480x60 {{url('/')}} banner code --&gt;</pre>
                                </div>
                                <div id="336x280" class="tab-pane">
                                    <img class="center-block m-b" src="https://{{url('/')}}/images/banners/r3.jpg" style="display: none !important;">
                                    <pre>&lt;!-- Start of 336x280 {{url('/')}} banner code --&gt;<br>&lt;a href="{{url('/register').'/?ref='.Auth::user()->affiliate_id}}"&gt;&lt;img src="http://{{url('/')}}/images/banners/r3.jpg" title="{{url('/')}} - Make short links and earn the biggest money" /&gt;&lt;/a&gt;<br>&lt;!-- End of 336x280 {{url('/')}} banner code --&gt;</pre>
                                </div>
                                <div id="300x250" class="tab-pane active">
                                    <img class="center-block m-b" src="https://{{url('/')}}/images/banners/r4.jpg" style="display: none !important;">
                                    <pre>&lt;!-- Start of 300x250 {{url('/')}} banner code --&gt;<br>&lt;a href="{{url('/register').'/?ref='.Auth::user()->affiliate_id}}"&gt;&lt;img src="http://{{url('/')}}/images/banners/r4.jpg" title="{{url('/')}} - Make short links and earn the biggest money" /&gt;&lt;/a&gt;<br>&lt;!-- End of 300x250 {{url('/')}} banner code --&gt;</pre>
                                </div>
                                <div id="250x250" class="tab-pane">
                                    <img class="center-block m-b" src="https://{{url('/')}}/images/banners/r5.jpg" style="display: none !important;">
                                    <pre>&lt;!-- Start of 250x250 {{url('/')}} banner code --&gt;<br>&lt;a href="{{url('/register').'/?ref='.Auth::user()->affiliate_id}}"&gt;&lt;img src="http://{{url('/')}}/images/banners/r5.jpg" title="{{url('/')}} - Make short links and earn the biggest money" /&gt;&lt;/a&gt;<br>&lt;!-- End of 250x250 {{url('/')}} banner code --&gt;</pre>
                                </div>
                                <div id="160x600" class="tab-pane">
                                    <img class="center-block m-b" src="https://{{url('/')}}/images/banners/r6.jpg" style="display: none !important;">
                                    <pre>&lt;!-- Start of 160x600 {{url('/')}} banner code --&gt;<br>&lt;a href="{{url('/register').'/?ref='.Auth::user()->affiliate_id}}"&gt;&lt;img src="http://{{url('/')}}/images/banners/r6.jpg" title="{{url('/')}} - Make short links and earn the biggest money" /&gt;&lt;/a&gt;<br>&lt;!-- End of 160x600 {{url('/')}} banner code --&gt;</pre>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Modal -->
   
</section>
<hr>
               <div class="text-center">
                <h4 class="font-thin m-t-xl text-info"><b>My Referrals </b></h4>
               </div>
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

                </section>
            </section>

        </section>     
</section>
</section>


@endsection
