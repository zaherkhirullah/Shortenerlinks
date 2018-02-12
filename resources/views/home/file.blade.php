@extends('layouts.visitor')

@section('content')

<center>
    <div> <a href="{{ $link->path }}" download></a>{{ $link->slug }} </div>
</center>

@endsection