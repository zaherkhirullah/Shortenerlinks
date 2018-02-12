@extends('layouts.visitor')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="skip-container">
              <div class="text-center">
                <h4>Your link is almost ready.</h4>
                <span id="countdown" class="countdown end">
                <span id="timer" class="timer">0</span>
                <br>Seconds
                </span>
                <span class="desc"><a href="{{url('/')}}">Join now</a> and earn on every link you shorten. Up to
                <a href="{{route('rates')}}">$15 / 10000</a> views.
                </span>
                <form method="POST" action="{{route('goLink',$link->slug)}}" accept-charset="UTF-8">
                {{ csrf_field() }}
                <button type="submit" id="btn-main" class="btn btn-main">Get Link</button>
                <noscript>&lt;button type="submit" class="btn btn-main"&gt;Get Link&lt;/button&gt;</noscript>
                </form>

                <div style="width: 300px; margin: 0 auto;">
                    <script data-cfasync="false" type="text/javascript" src="//p220333.clksite.com/adServe/banners?tid=IF1OUO_300X250"></script>
                 </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

$(document).ready(function(){
    setTimeout(3000);
})   

</script>
@endsection