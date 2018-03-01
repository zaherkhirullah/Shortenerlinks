@extends('layouts.adlayout')
@section('title','{{$role->slug}}  @lang('lang.Details') ')

@section('content')
<div class="col-md-12">
<h2> {{$role->slug}}  @lang('lang.Details') </h2>
</div>
@endsection