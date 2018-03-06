@extends('layouts.layout')
@section('content')
  
<section class="scrollable padder">
    <section class="content">
        <div class="col-md-12">
            <div class="box panel">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <i class="fa fa-link"></i>
                        @if(Route::is('link.create'))
                             @lang('lang.shorter')   @lang('lang.new_link')  
                        @elseif(Route::is('link.edit'))
                            @lang('lang.edit')   @lang('lang.Link')  
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
                            @if(Route::is('link.create'))
                                @include('_includes.forms.user.link.create')
                            @elseif(Route::is('link.edit'))
                                 @include('_includes.forms.user.link.edit')
                            @endif 
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>

        @endsection