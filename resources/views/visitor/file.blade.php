@extends('layouts.visitor')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="skip-container">
              <div class="text-center">
                  
                <h4>Your file is almost ready.</h4>
                <div style="width: 300px; margin: 0 auto;">                
                        @foreach($ads->take(1)->get() as $ad)
                        {!! $ad->value !!}
                        @endforeach
                </div>
                <div class="row">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>
                                    <i class="fa fa-fw fa-calendar-o" aria-hidden="true"></i>
                                    رفع بتاريخ
                                </td>
                                <td>
                                    2016-01-27 - 20:27:54
                                </td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-fw fa-user" aria-hidden="true"></i>
                                    رفع من قبل
                                </td>
                                <td>
                                    <a href="https://www.file-upload.com/users/Karim5595" style="text-decoration: none;">
                                        Karim5595
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fa fa-fw fa-hdd-o" aria-hidden="true"></i>
                                    الحجم
                                </td>
                                <td>
                                    318 KB&nbsp;
                                        <i class="fa fa-fw fa-flag" aria-hidden="true"></i>
                                        <a href="https://www.file-upload.com/?op=report_file&amp;id=n53nxp4dvwkg">
                                            إرسال تقرير
                                        </a>
                                </td>
                            </tr>  
                            <tr>
                                <td><i class="fa fa-fw fa-download" aria-hidden="true"></i>
                                    تحميل
                                </td>
                                <td>
                                    79 times
                                </td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-fw fa-share" aria-hidden="true"></i>
                                    شارك هذا الملف
                                </td>
                                <td>
                                    <ul id="sharebuttons">
                                        <li><a href="javascript:share_facebook(document.location)" class="fb" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="javascript:share_twitter(document.location)" class="tw" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="javascript:share_vk(document.location)" class="vk" title="Vk"><i class="fa fa-vk" aria-hidden="true"></i></a></li>
                                        <li><a href="javascript:share_gplus(document.location)" class="gplus" title="Google+"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                    </ul>
                                </td>
                            </tr>
                        
                        </tbody>
                    </table>
                </div>
                <div class="row" >
                    <span id="countdown" class="countdown end">
                     <span id="timer" class="timer">{{$timer}}</span>
                        <br>Seconds
                    </span>
                    <span class="desc">
                        <a href="{{url('/')}}">Join now</a> and earn on every file you shorten. Up to
                        <a href="{{route('rates')}}">$15 / 10000</a> views.
                    </span>
                    <div style="width: 300px; margin: 0 auto;">
                        @foreach($ads->take(1)->skip(1)->get() as $ad)
                        {!! $ad->value !!}
                        @endforeach
                    </div>
                    <form method="POST" id="form_post" action="{{route('downloadFile',$file->slug)}}" accept-charset="UTF-8">
                    {{ csrf_field() }}

                    <button type="submit" id="btn-main" class="btn btn-main" disabled="true" >Get file</button>
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
            $('#form_post').attr('disabled','disabled');
            $(this).attr('disabled','disabled');
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