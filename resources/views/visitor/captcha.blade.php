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
                    <script data-cfasync="false" src="/cdn-cgi/scripts/d07b1474/cloudflare-static/email-decode.min.js"></script><script async="" src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- File-upload.com Responsive -->
                    <ins class="adsbygoogle" style="display: block; height: 90px;" data-ad-client="ca-pub-8444791665411883" data-ad-slot="6156200074" data-ad-format="auto" data-adsbygoogle-status="done"><ins id="aswift_0_expand" style="display:inline-table;border:none;height:90px;margin:0;padding:0;position:relative;visibility:visible;width:1110px;background-color:transparent;"><ins id="aswift_0_anchor" style="display:block;border:none;height:90px;margin:0;padding:0;position:relative;visibility:visible;width:1110px;background-color:transparent;"><iframe width="1110" height="90" frameborder="0" marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true" scrolling="no" allowfullscreen="true" onload="var i=this.id,s=window.google_iframe_oncopy,H=s&amp;&amp;s.handlers,h=H&amp;&amp;H[i],w=this.contentWindow,d;try{d=w.document}catch(e){}if(h&amp;&amp;d&amp;&amp;(!d.body||!d.body.firstChild)){if(h.call){setTimeout(h,0)}else if(h.match){try{h=s.upd(h,i)}catch(e){}w.location.replace(h)}}" id="aswift_0" name="aswift_0" style="left:0;position:absolute;top:0;width:1110px;height:90px;"></iframe></ins></ins></ins>
                    <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                
                    <!--[/GoogleAdvert]-->
                    <div class="dareaname">
                        <span>  {{$file->slug}}  @lang('lang.download_file') </span>
                        <p>
                                {{$file->size}}
                           <font color="red">{{$file->shorted_url}}</font> 
                        </p>
                    </div>

                    <div class="stdt"> @lang('lang.m_select_download_type')</div>
                        <form method="POST" action="">
                            <input type="hidden" name="op" value="download1">
                            <input type="hidden" name="usr_login" value="">
                            <input type="hidden" name="id" value="{{$file->id}}">
                            <input type="hidden" name="fname" value="{{$file->filename}}">
                            <input type="hidden" name="referer" value="">
                            <input type="submit" class="btn btn-xs btn-success mnbt1" name="method_premium" value="تحميل مميز">
                            <input type="submit" class="btn btn-xs btn-primary mnbt1" name="method_free" value="تحميل مجاني">
                        </form>
                    </div>
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
                                        <iframe class="banner centCaptcha" src="https://www.google.com/recaptcha/api/fallback?k={{$site_key}}" frameborder="0" scrolling="no"
                                        style="border-style: none;">
                                        </iframe>
                                                    </div>
                                        <div class="captchaResponse">
                                            <textarea id="g-recaptcha-response" name="g-recaptcha-response"class="g-recaptcha-response gResponse"  value="">
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                                
                            <input type="submit">
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