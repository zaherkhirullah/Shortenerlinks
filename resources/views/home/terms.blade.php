@extends('layouts.holayout')

@section('content')


<div class="headline-bg rates-headline-bg"></div>

<section class="common-section section section-on-bg">
<h2 class="title container text-center">Our Terms</h2>
<div class="container text-center">
<div class="container-inner">
<div class="about">
<p>We pay for 
    <span class="highlight">ALL</span> 
    legitimate visitor you bring to your links and payout <span class="highlight">at least $1.5</span> per 1000 views.
    Multiple views from the same viewer are 
    <span class="highlight">also counted</span> 
    thus you will be benefiting from all your traffic.
</p>
<table class="table table-striped">
    <thead>
        <tr>
            <th class="col-md-2">@lang('lang.number')</th>
            <th class="col-md-8">@lang('lang.term')</th>
        </tr>
    </thead>
    <tbody>
            @for($x=0 ;$x< 10;$x++)
            <tr>
                    <td>{{$x}}</td>
                    <td>term description for our site</td>
            </tr>
            @endfor
    </tbody>
</table>
</div>
<div class="join-us text-center">
<p>Join us today and start earning now!</p>
<p><a class="btn btn-cta btn-cta-secondary" href="{{route('register')}}">Sign Up Free</a></p>
</div>
</div>
</div>
</section>
@endsection