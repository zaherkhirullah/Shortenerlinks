@extends('layouts.layout')
@section('title','{{$link->slug}}  Details')

@section('content')
<div class="col-md-12">
<h2> {{$link->slug}}  @lang('lang.Details')</h2>

@foreach ($visitors as $visitor)
<div  class="panel panel-body">
    <ul>
         <li> <b class="text-success"> Country:</b>  {{$visitor->country}}</li>
         <li> <b class="text-success"> Link Id</b>  {{$visitor->link_id}}</li>
        <li>  <b class="text-success"> ip Address</b>  {{$visitor->ip_visitor}}</li>
    </ul>
</div>
@endforeach
</div>
@endsection