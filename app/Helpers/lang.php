<?php

if(!function_exists('lang')){
    function lang()
    {
        if(session()->has('lang'))
            return session('lang');
        else
            return 'en';
    }
}
if(!function_exists('direct')){
    function direct()
    {
        if(session()->has('lang'))
        {
            if(session('lang')=='ar')
                return 'rtl';
        }
        return 'ltr';
    }
}

