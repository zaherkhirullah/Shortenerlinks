@extends('layouts.holayout')

@section('content')
<div class="headline-bg"></div>
<section class="row">
        <span class="col-md-4 pull-right">    
                @include('tools.partials.flash_message') 
        </span>
</section>
<div class="section section-on-bg">
<h2 class="title container text-center">@lang('lang.files') {{$user->username}}</h2>
    <div class="container text-center">
        <div class="container-inner">
            <div class="about">
            @foreach($files as $file)
            <div class="col-md-4">
                    <div class="panel panel-body">
                        <ul>
                            <li> <b class="text-success"> @lang('lang.Name'): </b>  {{$file->slug}}</li>
                            <li> <b class="text-success"> @lang('lang.file_name'): </b>  <small>{{$file->file_name}}</small></li>
                            <li> <b class="text-success">@lang('lang.file_size'): </b>    {{$file->size}}</li>
                            <li> <b class="text-success">@lang('lang.file_downloads'): </b> {{$file->downloads}}</li>
                        </ul>
                    </div>
                </div>
            @endforeach
            </div> 
        </div> 
    </div> 
</div>
@endsection