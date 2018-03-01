@extends('layouts.visitor')
@section('content')
<div class="container">
   <div class="col-md-8 col-md-offset-2">
      <div class="skip-container">
         <div class="text-center">
            <div class="afs_ads">&nbsp;</div>
            <span id="msg-adblock" class="msg-adblock"></span>
            <div style="width: 300px; margin: 0 auto;">
               @foreach($ads->take(1)->get() as $ad)
               {!! $ad->value !!}
               @endforeach
            </div>
            @if(Route::is('visitLink'))
               <form method="POST" action="{{route('getLink',$link->slug)}}" accept-charset="UTF-8" id="captcha-form">    
            @elseif(Route::is('visitFile'))
               <div class="page-wrap text-center" style="margin-bottom: 20px;">
               <form method="POST" action="{{route('getFile',$file->slug)}}" accept-charset="UTF-8" id="captcha-form">    
            @endif
               <h4>@lang('lang.m_check_capatcha')</h4>
               <div id="captcha" class="center-captcha"></div>
                  {{ csrf_field() }}
               <div style="border-style: none; bottom: 12px; left: 25px; margin: 0px; padding: 0px; right: 25px; background: #f9f9f9; border: 1px solid #c1c1c1; border-radius: 3px; height: 60px; width: 300px;">
               <textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid #c1c1c1; margin: 10px 25px; padding: 0px; resize: none; ">
               </textarea>
               </div>
               </div>
        <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&amp;render=explicit&amp;fallback=true" async="" defer=""></script>
        <input class="btn btn-main" type="submit" value="Submit">
                
        </form>
        <div style="width: 300px; margin: 0 auto;">
            @foreach($ads->take(2)->skip(1)->get() as $ad)
            {!! $ad->value !!}
            @endforeach
         </div>
         <script type="text/javascript" src="https://toro-tags.com/_tags/jstags.js?s=mx/ouo/300250"></script>
         @if(Route::is('visitLink'))
            <span class="desc">@lang('lang.click')
            <a href="{{route('Fc_visitLink',$link->slug)}}">@lang('lang.here')</a> @lang('lang.m_cant_verfy_capatcha')
            </span>
         @elseif(Route::is('visitFile'))
            <span class="desc">@lang('lang.click')
            <a href="{{route('Fc_visitFile',$file->slug)}}">@lang('lang.here')</a> @lang('lang.m_cant_verfy_capatcha')
            </span>
         @endif  
         </div>
      </div>
   </div>
</div>
@endsection
