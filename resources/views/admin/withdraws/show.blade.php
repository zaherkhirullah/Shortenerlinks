@extends('layouts.adlayout')
@section('title'," {{$withdraw->amount}} @lang('lang.Details')")


@section('content')
<div class="col-md-12">
<h2> {{$withdraw->amount}}  @lang('lang.Details') </h2>
</div>
@endsection