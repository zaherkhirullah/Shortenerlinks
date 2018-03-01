@extends('layouts.adlayout')
@section('title'," {{$ticket->subject}} @lang('lang.Details')")

@section('content')
<div class="col-md-12">
<h2> {{$ticket->subject}}  @lang('lang.Details') </h2>
</div>
@endsection