@extends('layouts.adlayout')
@section('title',"{{$link->slug}}  @lang('lang.Details')")
@section('content')
    
<h2> {{$link->slug}} @lang('lang.link')  @lang('lang.Details')</h2>
<center>
   <h2> @lang('lang.visit')  @lang('lang.links') {{$visitors->count()}}</h2>
</center>

<div class="col-md-12">
   <div class="col-md-5 col-sm-5 col-xs-5">
      <div id="pop-div"></div>
      {{--  // With Lava class alias  --}}
      <?=$lava->render('GeoChart', 'visitors', 'pop-div') ?>
   </div>
</div>
<hr>
<section class="col-md-12"> 
   @foreach ($visitors as $visitor)
      <div class="col-md-3">
         <div  class="panel panel-body">
               {{--  @if($visitor->ip && $visitor->link_id)  --}}
               <ul class="list-unstyled">
                     <li> <b class="text-success">  @lang('lang.country'): </b>  {{$visitor->country}}</li>
                     <li> <b class="text-success">  @lang('lang.city'): </b>  {{$visitor->city}}</li>
                     <li> <b class="text-success">  @lang('lang.link'): </b>  {{$visitor->link_id}}</li>
                     <li>  <b class="text-success">  @lang('lang.ip'): </b>  {{$visitor->ip}}</li>
                     <li>  <b class="text-success">  @lang('lang.visited_at'): </b>  {{$visitor->created_at}}</li>     
               </ul>
         </div>
      </div>
   @endforeach
</section>
@endsection