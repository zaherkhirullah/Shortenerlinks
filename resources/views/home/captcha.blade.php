@extends('layouts.visitor')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="skip-container">
                    <div class="text-center">
                        <div class="afs_ads">&nbsp;</div>
                        <h4>Please check the captcha box to proceed to the destination page.</h4>
                        <span id="msg-adblock" class="msg-adblock">Nothing.</span>
                    
                        @if(Route::is('visitLink'))
                        <form method="POST" action="{{route('getLink',$link->slug)}}" accept-charset="UTF-8" id="captcha-form">    
                        @elseif(Route::is('visitFile'))
                        <form method="POST" action="{{route('getFile',$file->slug)}}" accept-charset="UTF-8" id="captcha-form">    
                        @endif  
                <div id="captcha" class="center-captcha"></div>
                        
            <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
            </script>
            <noscript>
                <div class="center-captcha" class="centCaptcha">
                    <div class="centCaptcha relative">
                        <div class="centCaptcha  absolute">
                         <div class="g-recaptcha" data-sitekey="6LcF5EUUAAAAAJ_qkzlldZkWkKuiTMXErAeM1Nj5"></div> 
                            <iframe class="banner centCaptcha" src="https://www.google.com/recaptcha/api/fallback?k=6LcF5EUUAAAAAJ_qkzlldZkWkKuiTMXErAeM1Nj5" frameborder="0" scrolling="no"
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
                        <script type="text/javascript" src="https://toro-tags.com/_tags/jstags.js?s=mx/ouo/300250">
                        </script>
                         @if(Route::is('visitLink'))
                         <span class="desc">Click
                          <a href="{{route('Fc_visitLink',$link->slug)}}">here</a> if you cannot submit the recaptcha.
                          </span>
                            @elseif(Route::is('visitFile'))
                            <span class="desc">Click
                             <a href="{{route('Fc_visitFile',$file->slug)}}">here</a> if you cannot submit the recaptcha.
                             </span>
                            @endif  
                      </div>
                </div>
            </div>
        </div>
    </div>

@endsection