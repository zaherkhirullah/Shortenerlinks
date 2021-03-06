@extends('layouts.visitor')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="skip-container">
              <div class="text-center">
                <h4>Your link is almost ready.</h4>
                <div style="width: 300px; margin: 0 auto;">
                        @foreach($ads->take(1)->get() as $ad)
                        {!! $ad->value !!}
                        @endforeach
                </div>
                <span id="countdown" class="countdown end">
                <span id="timer" class="timer">{{$timer}}</span>
                <br>Seconds
                </span>
                <span class="desc">
                        <a href="{{url('/')}}">@lang('lang.join_now')</a>@lang('lang.join_now') @lang('lang.earn_on_every') @lang('lang.up_to') 
                        <a href="{{route('rates')}}">$5 /1000</a> @lang('lang.view').
                </span>
                <div style="width: 300px; margin: 0 auto;">
                        @foreach($ads->take(1)->skip(1)->get() as $ad)
                        {!! $ad->value !!}
                        @endforeach
                </div>
                <form method="POST" action="{{route('goLink',$link->slug)}}" accept-charset="UTF-8">
                    {{ csrf_field() }}
                    <button type="submit" disabled="true" id="btn-main" class="btn btn-main" target="_blank">Get Link</button>
                </form>

                <div style="width: 300px; margin: 0 auto;">
                    @foreach($ads->take(1)->skip(2)->get() as $ad)
                    {!! $ad->value !!}
                    @endforeach
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')

    <script>
        $(document).ready(function(){
        
            $('#btn-main').click(function() {
            // $('#form_post').attr('href','');
            // $(this).attr('disabled','disabled');
        });
        });
    </script>
    <script>
        var myVar = setInterval(myTimer, 1000);
        function myTimer()
        {
            document.getElementById("btn-main").disabled = true;
            if( document.getElementById("timer").innerHTML > 0){
                document.getElementById("timer").innerHTML -=1;
            }
            else{
                document.getElementById("btn-main").disabled = false;
            }
        }
    </script>
@endsection