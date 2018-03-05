@extends('layouts.adlayout')
@section('content')
  
<section class="scrollable padder">
    <section class="content">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <i class="fa fa-aboutPlan">
                        </i>
                        @if(Route::is('aboutPlans.create'))
                        @lang('lang.add')   @lang('lang.new_aboutPlan')
                        @elseif(Route::is('aboutPlans.edit'))
                        @lang('lang.edit')    @lang('lang.aboutPlan')
                        @endif 
                             
                    </h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="display: block;">
                    <div class="box-short" id="shorterNew" >
                        <div class="box box-solid shorten-member">
                            <div class="box-body">
                            @if(Route::is('aboutPlans.create'))
                                @include('_includes.forms.admin.aboutPlan.create')
                            @elseif(Route::is('aboutPlans.edit'))
                                 @include('_includes.forms.admin.aboutPlan.edit')
                            @endif 
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>


        @endsection