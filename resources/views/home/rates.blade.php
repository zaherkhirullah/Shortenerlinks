@extends('layouts.holayout')

@section('content')


<div class="headline-bg rates-headline-bg"></div>
<section class="row">
        <span class="col-md-4 pull-right">    
                @include('tools.partials.flash_message') 
        </span>
</section>
<section class="common-section section section-on-bg">
        <h2 class="title container text-center">@lang('lang.all_prices')</h2>
        <div class="container text-center">
        <div class="container-inner">
        <div class="about">
<p>We pay for <span class="highlight">ALL</span> legitimate visitor you bring to your links and payout <span class="highlight">at least $1.5</span> per 1000 views.
Multiple views from the same viewer are <span class="highlight">also counted</span> thus you will be benefiting from all your traffic.</p>
    {{--  <table class="table table-striped">  --}}
            <table class="table table-striped" cellspacing="0" width="100%">        
        <thead>
            <tr>
                    <th class="col-md-4">@lang('lang.country')</th>
                    <th class="col-md-4">@lang('lang.file_price')</th>
                    <th class="col-md-4">@lang('lang.link_price')</th>
            </tr>
        </thead>
        <tbody>
            @foreach($countries as $country)
            <tr>
                    <td >{{$country->name}}</td>
                    <td>@lang('lang.usd') {{$country->file_price*1000}}</td>
                    <td>@lang('lang.usd') {{$country->link_price*1000}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $countries->links() }}
</div>
<div class="join-us text-center">
<p>Join us today and start earning now!</p>
<p><a class="btn btn-cta btn-cta-secondary" href="{{route('register')}}">Sign Up Free</a></p>
</div>
</div>
</div>
</section>
@endsection
