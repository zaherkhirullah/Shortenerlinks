@extends('layouts.layout')
@section('title','{{$link->slug}}  Details')

@section('content')
<div class="col-md-12">
<h2> {{$link->slug}}  @lang('lang.Details')</h2>

@foreach ($visitors as $visitor)
<div  class="panel panel-body">
    <ul>
         <li>   {{$visitor->country}}</li>
         <li>   {{$visitor->link_id}}</li>
            <li>{{$visitor->ip_visitor}}</li>
    </ul>
</div>
@endforeach
</div>
@endsection