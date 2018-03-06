@extends('layouts.layout')

@section('content')

<center>
<h1> @lang('lang.all') @lang('lang.Plans')</h1>
</center>

  @foreach($plans as $plan)
  <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <!-- PRICE ITEM -->
      <div class="panel price panel-red">
        <div class="panel-heading  text-center">
        <h3>{{$plan->name}}</h3>
        </div>
        <div class="panel-body text-center">
          <p class="lead" style="font-size:28px"><strong>
            $ {{$plan->monthly_price}} / month</strong></p>
        </div>
        <ul class="list-group list-group-flush text-center">
          {{-- 
             @php 
           $aboutPlanss =$plan->aboutsPlans;
           $arrayName = array();
           for ($i=0; $i < count($aboutPlanss) ; $i++) 
           { 
             if($aboutPlanss[$i]->value==1){
               dd($aboutPlanss[$i]->value);
               $arrayName[$i]= $aboutPlanss[$i]->id;
             }
           }
           @endphp  
           --}}
       
            @foreach($plan->aboutsPlans as $about)
            <li class="list-group-item"> 
            @if($about->value==1)
                  <i class="icon-ok text-success fa fa-check"> </i>              
                @else
                    <i class="icon-ok text-danger fa fa-times"></i> 
                @endif
              @php 
              $des=  $about->about_plans($about->about_id)->first();
              @endphp
              {{$des->name}}
              </li>
            @endforeach     
        </ul>
        <div class="panel-footer">
        @if(Auth::user()->plan_id < $plan->id )
        <div class="btn-group btn-block">
            <button type="button" class="btn btn-lg btn-block btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            Buy Now <span class="caret"></span>
             </button>
            <ul class="dropdown-menu btn-block">
            <li  >
              <form name="post_5a9e68e1e4c95858746308" style="display:none;" method="post" action="/member/users/pay-plan/2/m">
                <input type="hidden" name="_method" value="POST">
              <input type="hidden" name="_csrfToken" value="2a28941a4fee8e1d95ff64dd4353c2687783a4b528210687045993fbe54fc75338014929bac6c195417ce2c2a60b7f7f0962ee03ae8f9a77603358c073895db7">
              <div style="display:none;">
                <input type="hidden" name="_Token[fields]" value="ab89542c282a164fe11e4918f2063134e73aaddd%3A">
                <input type="hidden" name="_Token[unlocked]" value="adcopy_challenge%7Cadcopy_response%7Cg-recaptcha-response">
              </div>
            </form>
            <a href="#" onclick="document.post_5a9e68e1e4c95858746308.submit(); event.returnValue = false; return false;">${{$plan->monthly_price}} Monthly
              </a>
            </li>
            <li>
              <form name="post_5a9e68e1e5444346593642" style="display:none;" method="post" action="/member/users/pay-plan/2/y">
                <input type="hidden" name="_method" value="POST"><input type="hidden" name="_csrfToken" value="2a28941a4fee8e1d95ff64dd4353c2687783a4b528210687045993fbe54fc75338014929bac6c195417ce2c2a60b7f7f0962ee03ae8f9a77603358c073895db7">
                <div style="display:none;">
                  <input type="hidden" name="_Token[fields]" value="6ea45cc1299fb9fc5ae2148f4785b4b6cdbe23af%3A">
                  <input type="hidden" name="_Token[unlocked]" value="adcopy_challenge%7Cadcopy_response%7Cg-recaptcha-response">
                </div>
              </form>
              <a href="#" onclick="document.post_5a9e68e1e5444346593642.submit(); event.returnValue = false; return false;">${{$plan->yearly_price}}  Yearly</a></li>
            </ul>
            </div>
          {{--  <a class="btn btn-lg btn-block btn-danger" href="#">BUY NOW</a>  --}}
        @endif
        @if(Auth::user()->plan_id == $plan->id )
        <p class="btn btn-lg btn-block btn-success" >Active</p>
        @endif
      </div>
      </div>
      <!-- /PRICE ITEM -->
    </div>
  @endforeach

{{--  
<div class="col-md-3 col-lg-3 col-xs-6 col-sm-6">
  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
</div>
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
    --}}

<div class="col-md-12">
</div>
@endsection