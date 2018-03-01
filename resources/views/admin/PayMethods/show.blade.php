@extends('layouts.adlayout')
@section('title','{{$PayMethod->name}}  @lang('lang.Details') ')

@section('content')
<div class="col-md-12">
<h2> {{$PayMethod->name}}  @lang('lang.Details') </h2>
</div>
@endsection