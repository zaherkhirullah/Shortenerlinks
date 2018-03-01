@extends('layouts.layout')
@section('title','{{$link->slug}}  Details')

@section('content')
<div class="col-md-12">
<h2> {{$link->slug}}  @lang('lang.Details')</h2>

@foreach ($visitors as $visitor)
<div class="col-md-4">
        <div  class="panel panel-body">
            <ul>
                    <li> <b class="text-success"> Country:</b>  {{$visitor->country}}</li>
                    <li> <b class="text-success"> City:</b>  {{$visitor->city}}</li>
                    <li> <b class="text-success"> Link Id</b>  {{$visitor->link_id}}</li>
                <li>  <b class="text-success"> ip Address</b>  {{$visitor->ip}}</li>
            </ul>
        </div>
    </div>
@endforeach
</div>
@endsection