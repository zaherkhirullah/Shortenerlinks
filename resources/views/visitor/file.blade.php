@extends('layouts.visitor')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="skip-container">
              <div class="text-center">
                  
                <h4>@lang('lang.your_file_ready')</h4>
                <div style="width: 300px; margin: 0 auto;">                
                        @foreach($ads->take(1)->get() as $ad)
                        {!! $ad->value !!}
                        @endforeach
                </div>
            <h3>
                @lang('lang.download') @lang('lang.file')
                <dt class="text-success"> {{$file->slug}}</dt>
            </h3>
                
                <div class="row">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>
                                    <i class="fa fa-fw fa-calendar-o" aria-hidden="true"></i>
                                    @lang('lang.created_at')
                                </td>
                                <td>
                                        {{ $file->created_at}}
                                </td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-fw fa-user" aria-hidden="true"></i>
                                    @lang('lang.username')
                                </td>
                                <td>
                                    <a href="{{route('user.files',$file->user->username)}}" style="text-decoration: none;">
                                        {{ $file->user->username}}
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fa fa-fw fa-hdd-o" aria-hidden="true"></i>
                                    @lang('lang.file_size')
                                </td>
                                <td>
                                    {{$file->size}}
                                        <i class="fa fa-fw fa-flag" aria-hidden="true"></i>
                                        <a href="{{url('/contacts')}}">
                                            إرسال تقرير
                                        </a>
                                </td>
                            </tr>  
                            <tr>
                                <td><i class="fa fa-fw fa-download" aria-hidden="true"></i>
                                    @lang('lang.downloads')
                                </td>
                                <td>
                                      {{$file->downloads}} times
                                </td>
                            </tr>
                        
                        </tbody>
                    </table>
                </div>
                <div class="row" >
                    <span id="countdown" class="countdown end">
                     <span id="timer" class="timer">{{$timer}}</span>
                        <br>   @lang('lang.seconds')
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