@extends('layouts.adlayout')
@section('content')
  
<section class="scrollable padder">
    <section class="content">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <i class="fa fa-plus"> </i>
                        @if(Route::is('folders.create'))
                              Add New Folder 
                        @elseif(Route::is('folders.edit'))
                              Edit This Folder
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
                            @if(Route::is('folders.create'))
                                @include('_includes.forms.admin.folder.create')
                            @elseif(Route::is('folders.edit'))
                                 @include('_includes.forms.admin.folder.edit')
                            @endif 
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>


        @endsection