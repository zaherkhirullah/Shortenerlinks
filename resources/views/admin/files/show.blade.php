@extends('layouts.adlayout')
@section('title',"{{$file->title}}  @lang('lang.Details')")

@section('content')
<div class="col-md-12">
<h2> {{$file->title}}  @lang('lang.Details') </h2>
</div>
@endsection