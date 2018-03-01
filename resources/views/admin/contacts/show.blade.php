@extends('layouts.adlayout')
@section('title','{{$contacts->Message}}  @lang('lang.Details') ')

@section('content')
<div class="col-md-12">
<h2> {{$contacts->Message}}  @lang('lang.Details') </h2>
</div>
@endsection