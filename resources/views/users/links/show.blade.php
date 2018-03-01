@extends('layouts.layout')
@section('title',"{{$link->slug}} @lang('lang.Details')")
@endsection
@section('content')
<div class="col-md-12">
<h2> {{$link->slug}}  @lang('lang.Details')</h2>

@foreach ($visitors as $visitor)
<div class="col-md-4">
        <div  class="panel panel-body">
            <ul>
                    <li> <b class="text-success">  @lang('lang.country'): </b>  {{$visitor->country}}</li>
                    <li> <b class="text-success">  @lang('lang.city'): </b>  {{$visitor->city}}</li>
                    <li> <b class="text-success">  @lang('lang.link'): </b>  {{$visitor->link_id}}</li>
                    <li>  <b class="text-success">  @lang('lang.ip'): </b>  {{$visitor->ip}}</li>
            </ul>
        </div>
    </div>
@endforeach
</div>
@endsection