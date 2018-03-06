@extends('layouts.layout')

@section('content')

<center>
<h1> @lang('lang.all') @lang('lang.Plans')</h1>
</center>
  @foreach($plans as $plan)
  <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
				
      <!-- PRICE ITEM -->
      <div class="panel price panel-red">
        <div class="panel-heading  text-center">
        <h3>{{$plan->name}}</h3>
        </div>
        <div class="panel-body text-center">
          <p class="lead" style="font-size:28px"><strong>$ {{$plan->monthly_price}} / month</strong></p>
        </div>
        <ul class="list-group list-group-flush text-center">
          @php 
          $aboutPlanss =$plan->about_plans;
          $arrayName = array();
          for ($i=0; $i < count($aboutPlanss) ; $i++) 
          { 
            $arrayName[$i]= $aboutPlanss[$i]->id;
          }
          @endphp
            @foreach($about_plans as $about)
              @if(in_array($about->id , $arrayName ))
              <li class="list-group-item">
                  <i class="icon-ok text-success fa fa-check"> </i> 
              </li>
                @else
                <li class="list-group-item">
                    <i class="icon-ok text-danger fa fa-times"></i> 
                </li>
                  
                @endif
              @endforeach     
        </ul>
        <div class="panel-footer">
        @if(Auth::user()->plan_id < $plan->id )
          <a class="btn btn-lg btn-block btn-danger" href="#">BUY NOW!</a>
        @endif
        @if(Auth::user()->plan_id == $plan->id )
        <a class="btn btn-lg btn-block btn-success" href="#">Active</a>
        @endif
      </div>
      </div>
      <!-- /PRICE ITEM -->
    </div>
  @endforeach

  <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
  
    <!-- PRICE ITEM -->
    <div class="panel price panel-blue">
      <div class="panel-heading arrow_box text-center">
      <h3>@lang('lang.aboutPlans')</h3>
      </div>
      <div class="panel-body text-center">
        <p class="lead" style="font-size:28px"><strong>@lang('lang.Details')</strong></p>
      </div>
      <ul class="list-group list-group-flush text-center">
          @foreach($about_plans as $about)
          <li class="list-group-item">
              <i class="icon-ok text-danger"></i> {{$about->name}}
          </li>
        @endforeach
      </ul>

    </div>
    <!-- /PRICE ITEM -->
  </div>
  

<div class="col-md-12">
</div>
@endsection