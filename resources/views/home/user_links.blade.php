@extends('layouts.holayout')

@section('content')
<div class="headline-bg"></div>
<section class="row">
        <span class="col-md-4 pull-right">    
                @include('tools.partials.flash_message') 
        </span>
</section>
<section class="common-section section section-on-bg">
<h2 class="title container text-center">@lang('lang.links') {{$user->username}}</h2>
<div class="container text-center">
    <div class="container-inner">
        <div class="about">
        @foreach($links as $link)
        <div class="col-md-4">
                <div  class="panel panel-body">
                    <ul>
                        <li> <b class="text-success"> link:</b>  {{$link->shorted_url}}</li>
                        <li> <b class="text-success"> visits:</b>  {{$link->clicks}}</li>
                        <li> <b class="text-success"> Created date</b>  {{$link->created_at}}</li>
                    </ul>
                </div>
            </div>
        @endforeach
        </div> 
    </div> 
</div> 
</section>
@endsection