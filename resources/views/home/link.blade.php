@extends('layouts.visitor')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="skip-container">
              <div class="text-center">
                <h4>Your link is almost ready.</h4>
                <span id="countdown" class="countdown end">
                <span id="timer" class="timer">2</span>
                <br>Seconds
                </span>
                <span class="desc">
                <a href="{{url('/')}}">Join now</a> and earn on every link you shorten. Up to
                <a href="{{route('rates')}}">$5 / 10000</a> views.
                </span>
                <form method="POST" action="{{route('goLink',$link->slug)}}" accept-charset="UTF-8">
                {{ csrf_field() }}
                <button type="submit" disabled="true" id="btn-main" class="btn btn-main" data-single-click="" target="_blank">Get Link</button>
                </form>

                <!-- <div style="width: 300px; margin: 0 auto;">
                    <script data-cfasync="false" type="text/javascript" src="//p220333.clksite.com/adServe/banners?tid=IF1OUO_300X250"></script>
                 </div> -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){

    $('#btn-main').click(function() {
    $('#form_post').attr('href','');
    $(this).attr('disabled','disabled');
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
<!-- 
<script>
$(document).ready(function(){
    $('#btn-main').disabled = true;
        $myVar = setInterval(myTimer, 1000);
      

        function myTimer()
        {
         if( $('#timer').innerHTML > 0)
         {
            $('#timer').innerHTML -=1;
         }
         else
         {
            $('#btn-main').disabled = false;
         }
        }
    $('#btn-main').click(function() {
        $('#form_post').attr('disabled','disabled');
        $(this).attr('disabled','disabled');
    });
});
</script> -->
@endsection