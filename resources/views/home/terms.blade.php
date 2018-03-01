@extends('layouts.holayout')

@section('content')


<div class="headline-bg rates-headline-bg"></div>
<section class="row">
        <span class="col-md-4 pull-right">    
                @include('tools.partials.flash_message') 
        </span>
</section>
<section class="common-section section section-on-bg">
<h2 class="title container text-center">@lang('lang.our_terms')</h2>
<div class="container text-center">
<div class="container-inner">
<div class="about">

<table class="table table-striped">
    <thead>
        <tr>
            <th class="col-md-2">@lang('lang.number')</th>
            <th class="col-md-8">@lang('lang.term')</th>
        </tr>
    </thead>
    <tbody>
            @for($x=0 ;$x< 10;$x++)
            <tr>
                    <td>{{$x}}</td>
                    <td>term description for our site.</td>
            </tr>
            @endfor
            {{--  @for($terms as $term)
            <tr>
                    <td>{{$term->title}}</td>
                    <td>{{$term->description}}</td>
            </tr>
            @endfor  --}}
    </tbody>
</table>
</div>
<div class="join-us text-center">
<p>Join us today and start earning now!</p>
<p><a class="btn btn-cta btn-cta-secondary" href="{{route('register')}}">Sign Up Free</a></p>
</div>
</div>
</div>
</section>
@endsection