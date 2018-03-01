@extends('layouts.visitor')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="skip-container">
              <div class="text-center">
                <h4> @lang('lang.your_file_ready') </h4>
                <div style="width: 300px; margin: 0 auto;">                
                @foreach($ads->take(1)->get() as $ad)
                {!! $ad->value !!}
                @endforeach
                </div>
                <span id="countdown" class="countdown end">
                <span id="timer" class="timer">{{$timer}}</span>
                <br>@lang('lang.seconds')
                </span>
                <span class="desc">
                    <a href="{{url('/')}}">@lang('lang.join_now') </a>@lang('lang.join_now') @lang('lang.earn_on_every') @lang('lang.up_to') 
                    <a href="{{route('rates')}}">${{$country->link_price}} /1000</a> @lang('lang.view').
                </span>
                <div style="width: 300px; margin: 0 auto;">
                @foreach($ads->take(1)->skip(1)->get() as $ad)
                {!! $ad->value !!}
                @endforeach
                </div>
                <form method="POST" id="form_post" action="{{route('goFile',$file->slug)}}" accept-charset="UTF-8">
                {{ csrf_field() }}
                    @if($file->password)
                    <input type="text" name="password" for="password" placeholder="@lang('lang.password')"> 
                    @endif   
                <button type="submit" id="btn-main" class="btn btn-main" disabled="true" download>download file</button>
                <!-- <noscript disabled="true">&lt;button type="submit" class="btn btn-main"&gt;Get file&lt;/button&gt;</noscript> -->
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
            // $('#form_post').attr('disabled','disabled');
            // $(this).attr('disabled','disabled');
        });
           
            $Nvar = setInterval(myTimer, 1000);
            function myTimer()
            {
             $('#btn-main').disabled = true;
             if( $('#timer').innerHTML > 0)
             {
                $('#timer').innerHTML -=1;
             }
             else
             {
                $('#btn-main').disabled = false;
             }
            }
    });
</script>
<script>
    
    var myVar = setInterval(myTimer, 1000);
    function myTimer()
    {
        document.getElementById("btn-main").disabled = true;
        if( document.getElementById("timer").innerHTML >0  ){
            document.getElementById("timer").innerHTML -=1;
        }
        else{
            document.getElementById("btn-main").disabled = false;
        }
    }
</script>
@endsection