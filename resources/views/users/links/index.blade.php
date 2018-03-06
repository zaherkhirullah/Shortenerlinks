@extends('layouts.layout')

@section('content')

<div class="col-md-12">
  <section class="lter box panel">
    <header class="box-header with-border text-center">
      <h3 class="box-title">
        <i class="fa fa-link"></i>
        @if(Route::is('link.index'))
          @lang('lang.all') @lang('lang.Links')
        @elseif(Route::is('link.deletedLinks'))
          @lang('lang.all') @lang('lang.hidden_links')
        @endif 
      </h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse">
          <i class="fa fa-minus"></i>
        </button>
      </div>
    </header>
    <!-- /.box-header -->
    
    <section class="box-body"> 
        
      @if(count($links))
      <table id="DataTable" class="mdl-data-table table-hover table" cellspacing="0" width="100%">
           <div class="col-sm-3 " style="top:10px;">
            <a href="{{route('link.create')}}" type="button" class="btn btn-success btn-md">
             <i class="fa fa-link"></i>
             @lang('lang.add') @lang('lang.new_link')
            </a>
            </div>
              <thead>
                <tr>
                    <th>@lang('lang.Link')</th>
                    <th class="v-middle hidden-xs">@lang('lang.views')</th>
                    <th class="v-middle hidden-xs">@lang('lang.earnings')</th>
                    <th class="v-middle hidden-xs">@lang('lang.created_at')</th>
                    <th>@lang('lang.options')</th>
                </tr>
              </thead>
              <tfoot>
                  <tr>
                    <th>@lang('lang.Link')</th>
                    <th class="v-middle hidden-xs">@lang('lang.views')</th>
                    <th class="v-middle hidden-xs">@lang('lang.earnings')</th>
                    <th class="v-middle hidden-xs">@lang('lang.created_at')</th>
                    <th>@lang('lang.options')</th>
                </tr>
              </tfoot>
        <tbody>
          @foreach ($links as $link)
          <tr>
            <td>
              <a href="{{$link->shorted_url }}" class="h5 text-success" target="_blank">
                <strong>{{$link->shorted_url}}</strong>
              </a>
              <span class="pull-right">
                  <button class="btn btn-sm btn-copy text-success" data-clipboard-text="{{$link->shorted_url}}"
                      data-toggle="button">
                      <span class="text">
                        <i class="ion ion-ios-copy-outline text-md">
                        </i> @lang('lang.copy')
                      </span>
                      <span class="text-active">
                      <i class="fa fa-check"> </i> @lang('lang.copied')
                      </span>
                    </button>
                </span>
              <small class="text-muted block">
            
              {{$link->url}}
              </small>
            </td>
            <td class="v-middle hidden-xs">
              <a  href="{{route('link.show',$link->id)}}" class="btn btn-xs text-warning text-sm" target="_blank">
                        <i class="fa fa-eye"></i>
                </a> 
             {{$link->clicks}}</td>
             <td class="v-middle hidden-xs">
             {{$link->earnings}}
              <span class="btn-xs text-success text-xs"> $</span> 
            </td>
            <td class="v-middle hidden-xs">{{$link->created_at}}</td>
            <td class="pull-right">
              <a href="{{route('link.edit',$link->id)}}" title="Edit" data-toggle="modal"
                class="text-success" >
                <span class="text text-sm">
                  <i class="fa fa-edit">
                  </i> 
                </span>
              </a>
              @if(Route::is('link.index'))
              <a href="#delete-link-{{$link->id}}" title="Hide"  data-toggle="modal"
                class=" text-danger" >
                <span class="text text-sm">
                  <i class="fa fa-eye-slash">
                  </i> 
                </span>
              </a>
              @elseif(Route::is('link.deletedLinks'))
              <a href="#restore-link-{{$link->id}}" title="UnHidden"  data-toggle="modal"
                class="text-warning" >
                <span class="text text-sm">
                  <i class="fa fa-eye">
                  </i> 
                </span>
              </a>
              @endif

            </td>
          </tr>

          @if(Route::is('link.index'))
          <div class="modal fade" id="delete-link-{{$link->id}}">
            <div class="modal-dialog modal-shorten">
              <div class="modal-content bg-default">
                <div class="modal-body">
                  <div class="padder">
                    {!! Form::open(array('route' =>['link.destroy',$link->id],'method'=>'delete','class'=>'form-delete','id'=>'form-delete' ))!!}
                    <div class="text-center">
                      <h4 id="msg-shorten ">@lang('lang.hide') @lang('lang.link')</h4>
                    </div>
                    <hr>
                    <p> @lang('lang.are_you_want')  @lang('lang.hide') 
                      <b class="text-info">
                        {{$link->slug}} </b> @lang('lang.link') ?</p> 
                        <div class="modal-footer">
                          <button type="button" class="btn btn-rounded pull-left btn-default" data-dismiss="modal">
                              @lang('lang.cancle')
                          </button>

                          <button id="btn-delete" class="btn btn-rounded  pull-right btn-success" type="submit">
                            <i class="fa fa-eye-slash"></i> @lang('lang.hide')
                          </button>
                        </div>
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @elseif(Route::is('link.deletedLinks'))
              <div class="modal fade" id="restore-link-{{$link->id}}">
                <div class="modal-dialog modal-shorten">
                  <div class="modal-content bg-default">
                    <div class="modal-body">
                      <div class="padder">
                        {!! Form::open(array('route' =>['link.restore',$link->id], 'method'=>'delete',
                        'class'=>'form-restore','id'=>'form-restore' ))
                        !!}
                        <div class="text-center">
                          <h4 id="msg-shorten ">@lang('lang.restore') @lang('lang.link')</h4>
                        </div>
                        <hr>
                        <p>@lang('lang.are_you_want')  @lang('lang.restore')
                          <b class="text-info">
                            {{$link->slug}} </b> @lang('lang.link') ?
                          </p> 
                          <div class="modal-footer">
                            <button type="button" class="btn btn-rounded pull-left btn-default" data-dismiss="modal">
                                @lang('lang.cancle')
                            </button>
                            <button id="btn-delete" class="btn btn-rounded  pull-right btn-success" type="submit">
                              <i class="fa fa-eye"></i> @lang('lang.restore')
                            </button>
                          </div>
                          {!! Form::close() !!}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @endif 

                @endforeach
              </tbody> 
            </table>
            @else
            <div class="col-md-8 col-md-offset-2">
              <center> 
                <h2 class="text-danger alert alert-info"> @lang('lang.dont_have') @lang('lang.links')</h2>
              </center>
            </div>
            <div class="text-clear col-md-12">  </div>
            <div class="col-md-12 text-center">
              <a href="{{route('link.create')}}" class="btn btn-success"> 
              <i class="fa fa-plus"></i> 
                @lang('lang.click_to') @lang('lang.add') @lang('lang.new_link')
              </a>
            </div>
            @endif 
          </section>
        </section>
      </div>  
      @endsection
