@extends('layouts.adlayout')
@section('content')
  
<section class="scrollable padder">
    <section class="content">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <i class="fa fa-link">
                        </i>
                        @if(Route::is('domains.create'))
                             Add New Domain
                        @elseif(Route::is('domains.edit'))
                             Edit This Domain
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
                            @if(Route::is('domains.create'))
                                @include('_includes.forms.admin.domain.create')
                            @elseif(Route::is('domains.edit'))
                                 @include('_includes.forms.admin.domain.edit')
                            @endif 
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>


        @endsection