@extends('layouts.app')

@section('content')
     
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                 <div class="panel-body">
                        <section class="row">
                                <span class="col-md-4 pull-right">    
                                        @include('tools.partials.flash_message') 
                                </span>
                        </section>

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
