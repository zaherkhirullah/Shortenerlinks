@extends('layouts.layout')
@section('title',"{{$file->slug}} @lang('lang.Details')")
@endsection
@section('content')
<div class="col-md-12">
<h2> {{$file->slug}} @lang('lang.Details')</h2>
</div>
@endsection