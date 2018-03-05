@extends('layouts.adlayout')
@section('title',"{{$aboutPlan->name}}  @lang('lang.Details')")

@section('content')
<div class="col-md-12">
<h2> {{$aboutPlan->name}}  @lang('lang.Details') </h2>
</div>
@endsection