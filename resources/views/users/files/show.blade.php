@extends('layouts.layout')
@section('title',"{{$file->slug}} @lang('lang.Details')")
@section('content')
<h2> {{$file->slug}} @lang('lang.file')  @lang('lang.Details')</h2>
<center>
   <h2> @lang('lang.visit')  @lang('lang.files') {{$downloaders->count()}}</h2>
</center>

<div class="col-md-12">
   <div class="col-md-5 col-sm-5 col-xs-5">
      <div id="pop-div"></div>
      {{--  // With Lava class alias  --}}
      <?=$lava->render('GeoChart', 'downloaders', 'pop-div') ?>
   </div>
</div>
<hr>
<section class="col-md-12"> 
   @foreach ($downloaders as $downloader)
      <div class="col-md-3">
         <div  class="panel panel-body">
               {{--  @if($downloader->ip && $downloader->file_id)  --}}
               <ul class="list-unstyled">
                     <li> <b class="text-success">  @lang('lang.country'):    </b>  {{$downloader->country}}</li>
                     <li> <b class="text-success">  @lang('lang.city'):       </b>  {{$downloader->city}}</li>
                     <li> <b class="text-success">  @lang('lang.file'):       </b>  {{$downloader->file_id}}</li>
                     <li> <b class="text-success">  @lang('lang.ip'):         </b>  {{$downloader->ip}}</li>
                     <li> <b class="text-success">  @lang('lang.visited_at'): </b>  {{$downloader->created_at}}</li>     
               </ul>
         </div>
      </div>
   @endforeach
</section>
@endsection