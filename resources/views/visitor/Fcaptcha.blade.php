@extends('layouts.visitor')

@section('content')
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

                <!--[GoogleAdvert]-->       
                        
                <div class="adstop1">
                <script data-cfasync="false" src="/cdn-cgi/scripts/d07b1474/cloudflare-static/email-decode.min.js"></script>
                <script async="" src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- File-upload.com Responsive -->
                <ins class="adsbygoogle" style="display: block; height: 90px;" data-ad-client="ca-pub-8444791665411883" data-ad-slot="6156200074" data-ad-format="auto" data-adsbygoogle-status="done">ins id="aswift_0_expand" style="display:inline-table;border:none;height:90px;margin:0;padding:0;position:relative;visibility:visible;width:1110px;background-color:transparent;"><ins id="aswift_0_anchor" style="display:block;border:none;height:90px;margin:0;padding:0;position:relative;visibility:visible;width:1110px;background-color:transparent;"><iframe width="1110" height="90" frameborder="0" marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true" scrolling="no" allowfullscreen="true" onload="var i=this.id,s=window.google_iframe_oncopy,H=s&amp;&amp;s.handlers,h=H&amp;&amp;H[i],w=this.contentWindow,d;try{d=w.document}catch(e){}if(h&amp;&amp;d&amp;&amp;(!d.body||!d.body.firstChild)){if(h.call){setTimeout(h,0)}else if(h.match){try{h=s.upd(h,i)}catch(e){}w.location.replace(h)}}" id="aswift_0" name="aswift_0" style="left:0;position:absolute;top:0;width:1110px;height:90px;">
                        </iframe>
                </ins>
                </ins></ins>
                <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
                <form method="POST" action="{{route('getFile',$file->slug)}}" accept-charset="UTF-8" id="captcha-form">    
                @endif
                <h4>@lang('lang.m_check_capatcha')</h4>
                
                <div id="captcha" class="center-captcha"></div>
                        {{ csrf_field() }}
                <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
                </script>
                <noscript>
                        <div class="center-captcha" class="centCaptcha">
                        <div class="centCaptcha relative">
                                <div class="centCaptcha  absolute">
                                <div class="g-recaptcha" data-sitekey="{{$site_key}}"></div> 
                               
                                 </div>
                                <iframe src="https://www.google.com/recaptcha/api/fallback?k={{$site_key}}&amp;hl=ar&amp;v=v1517812337239&amp;t=3&amp;ff=true" frameborder="0" scrolling="no" style="width: 302px; height: 422px; border-style: none;"></iframe></div></div><div style="border-style: none; bottom: 12px; left: 25px; margin: 0px; padding: 0px; right: 25px; background: #f9f9f9; border: 1px solid #c1c1c1; border-radius: 3px; height: 60px; width: 300px;">
                                <textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid #c1c1c1; margin: 10px 25px; padding: 0px; resize: none; ">
                                 </textarea> 
                                <div class="captchaResponse">
                                        <textarea id="g-recaptcha-response" name="g-recaptcha-response"class="g-recaptcha-response gResponse"  value="">
                                        </textarea>
                                </div>
                                </div>
                        </div>
                        <input class="btn btn-main" type="submit" value="Submit">
                </noscript>
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
{{--  
<div class="container">
<div class="row">
<div class="col-md-6 col-md-offset-3">
<div class="skip-container">
<div class="text-center">
<h4>Please check the captcha box to proceed to the destination page.</h4>
<span id="msg-adblock" class="msg-adblock">Please disable your Adblocker.</span>
<div style="width: 300px; margin: 0 auto;">
        @foreach($ads->take(1)->get() as $ad)
        {!! $ad->value !!}
        @endforeach
</div>
<form method="POST" action="http://ouo.io/go/8qRygF" accept-charset="UTF-8" id="form-captcha"><input name="_token" type="hidden" value="8qpgosHs9F407JHmC2XGEovWju72b8V47tn7IGtJ">
<div id="captcha" class="center-captcha"><div><div style="width: 302px; height: 422px; position: relative;"><div style="width: 302px; height: 422px; position: absolute;">
        <iframe src="https://www.google.com/recaptcha/api/fallback?k=6LegWQETAAAAAIIaaAhEnrkimbuOF5QJb0ZiYEK7&amp;hl=ar&amp;v=v1517812337239&amp;t=3&amp;ff=true" frameborder="0" scrolling="no" style="width: 302px; height: 422px; border-style: none;"></iframe></div></div><div style="border-style: none; bottom: 12px; left: 25px; margin: 0px; padding: 0px; right: 25px; background: #f9f9f9; border: 1px solid #c1c1c1; border-radius: 3px; height: 60px; width: 300px;"><textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid #c1c1c1; margin: 10px 25px; padding: 0px; resize: none; "></textarea></div></div></div>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&amp;render=explicit&amp;fallback=true" async="" defer=""></script>
<input class="btn btn-main" type="submit" value="Submit">
</form>
<div style="width: 300px; margin: 0 auto;">
        @foreach($ads->take(2)->skip(1)->get() as $ad)
        {!! $ad->value !!}
        @endforeach
</div>
</div>
</div>
</div>
</div>
</div>  --}}

{{--  @endsection  --}}