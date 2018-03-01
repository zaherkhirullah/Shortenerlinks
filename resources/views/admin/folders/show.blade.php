@extends('layouts.adlayout')
@section('title',"{{$folder->name}}  @lang('lang.Details')")
@section('content')
<div class="col-md-12">
<h2> {{$folder->name}}  @lang('lang.Details') </h2>
</div>
@endsection