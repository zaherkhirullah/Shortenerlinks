@extends('layouts.error')

@section('content')
<div class="text-danger text-center">
    <h1 class="alert alert-danger">
        @if($value)
        <center> The {{$value}} Not Found </center>
        @else
        <center> The Page Not Found </center>
        @endif
    </h1>
</div>

@endsection