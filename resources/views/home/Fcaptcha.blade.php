@extends('layouts.visitor')

@section('content')

<div class="container">
<div class="row">
<div class="col-md-6 col-md-offset-3">
<div class="skip-container">
<div class="text-center">
<h4>Please check the captcha box to proceed to the destination page.</h4>
<span id="msg-adblock" class="msg-adblock">Please disable your Adblocker.</span>
<form method="POST" action="http://ouo.io/go/8qRygF" accept-charset="UTF-8" id="form-captcha"><input name="_token" type="hidden" value="8qpgosHs9F407JHmC2XGEovWju72b8V47tn7IGtJ">
<div id="captcha" class="center-captcha"><div><div style="width: 302px; height: 422px; position: relative;"><div style="width: 302px; height: 422px; position: absolute;"><iframe src="https://www.google.com/recaptcha/api/fallback?k=6LegWQETAAAAAIIaaAhEnrkimbuOF5QJb0ZiYEK7&amp;hl=ar&amp;v=v1517812337239&amp;t=3&amp;ff=true" frameborder="0" scrolling="no" style="width: 302px; height: 422px; border-style: none;"></iframe></div></div><div style="border-style: none; bottom: 12px; left: 25px; margin: 0px; padding: 0px; right: 25px; background: #f9f9f9; border: 1px solid #c1c1c1; border-radius: 3px; height: 60px; width: 300px;"><textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid #c1c1c1; margin: 10px 25px; padding: 0px; resize: none; "></textarea></div></div></div>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&amp;render=explicit&amp;fallback=true" async="" defer=""></script>
<input class="btn btn-main" type="submit" value="Submit">
</form>
<script type="text/javascript" src="https://toro-tags.com/_tags/jstags.js?s=mx/ouo/300250"></script>
</div>
</div>
</div>
</div>
</div>

@endsection