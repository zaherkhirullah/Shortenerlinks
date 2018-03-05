@extends('layouts.adlayout')
@section('title',"{{$plan->name}}  @lang('lang.Details')")

@section('content')
<div class="col-md-12">
<h2> {{$plan->name}}  @lang('lang.Details') </h2>
</div>
@endsection