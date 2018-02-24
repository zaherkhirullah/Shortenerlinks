@extends('layouts.layout')

@section('content')

<div class="col-md-12">
  <section class="lter box box-success">
    <header class="box-header with-border text-center">
      <h3 class="box-title">
        <i class="fa fa-folder-o">
        </i>
        @if(Route::is('folder.index'))
        @lang('lang.all') @lang('lang.Folders')
    @elseif(Route::is('folder.deletedfolders'))
    @lang('lang.all') @lang('lang.hidden_folder')
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
      @if(count($folders))
      <table id="DataTable" class="mdl-data-table table-hover table" cellspacing="0" width="100%">
           <div class="col-sm-3 " style="top:10px;">
            <a href="{{route('folder.create')}}" type="button" class="btn btn-success btn-md">
             <i class="fa fa-folder-o"></i>
             @lang('lang.add') @lang('lang.new_folder')
            </a>
            </div>
              <thead>
                <tr>
                    <th>@lang('lang.Name')</th>
                    <th class="v-middle hidden-xs">@lang('lang.created_at')</th>
                    <th>@lang('lang.options')</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>@lang('lang.Name')</th>
                     <th class="v-middle hidden-xs">@lang('lang.created_at')</th>
                    <th>@lang('lang.options')</th>
                </tr>
              </tfoot>
        <tbody>
          @foreach ($folders as $folder)
          <tr>
            <td>
              <a href="{{route('folder.show',$folder->name) }}" class="h5 text-success" target="_blank">
                <strong>{{$folder->name}}</strong>
              </a>
              <span class="pull-right">
              <button class="btn btn-sm btn-copy text-success" data-clipboard-text="{{$folder->shorted_url}}"
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
            
              {{$folder->url}}
              </small>
            </td>
            <td class="v-middle hidden-xs">
              <a  href="{{route('folder.show',$folder->id)}}" class="btn btn-xs text-warning text-sm" target="_blank">
                        <i class="fa fa-eye"></i>
                </a> 
             {{$folder->clicks}}</td>
             <td class="v-middle hidden-xs">
             {{$folder->earnings}}
              <span class="btn-xs text-success text-xs"> $</span> 
            </td>
            <td class="v-middle hidden-xs">{{$folder->created_at}}</td>
            <td class="pull-right">
              <a href="{{route('folder.edit',$folder->id)}}" title="Edit" data-toggle="modal"
                class="text-success" >
                <span class="text text-sm">
                  <i class="fa fa-edit">
                  </i> 
                </span>
              </a>
              @if(Route::is('folder.index'))
              <a href="#delete-folder-{{$folder->id}}" title="Hide"  data-toggle="modal"
                class=" text-danger" >
                <span class="text text-sm">
                  <i class="fa fa-eye-slash">
                  </i> 
                </span>
              </a>
              @elseif(Route::is('folder.deletedfolders'))
              <a href="#restore-folder-{{$folder->id}}" title="UnHidden"  data-toggle="modal"
                class="text-warning" >
                <span class="text text-sm">
                  <i class="fa fa-eye">
                  </i> 
                </span>
              </a>
              @endif

            </td>
          </tr>

          @if(Route::is('folder.index'))
          <div class="modal fade" id="delete-folder-{{$folder->id}}">
            <div class="modal-dialog modal-shorten">
              <div class="modal-content bg-default">
                <div class="modal-body">
                  <div class="padder">
                    {!! Form::open(array('route' =>['folder.destroy',$folder->id],'method'=>'delete','class'=>'form-delete','id'=>'form-delete' ))!!}
                    <div class="text-center">
                      <h4 id="msg-shorten ">@lang('lang.hide') @lang('lang.folder')</h4>
                    </div>
                    <hr>
                    <p>@lang('lang.are_you_want')  @lang('lang.hide') 
                      <b class="text-info">
                        {{$folder->slug}} </b> @lang('lang.folder') ?</p> 
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
              @elseif(Route::is('folder.deletedfolders'))
              <div class="modal fade" id="restore-folder-{{$folder->id}}">
                <div class="modal-dialog modal-shorten">
                  <div class="modal-content bg-default">
                    <div class="modal-body">
                      <div class="padder">
                        {!! Form::open(array('route' =>['folders.restore',$folder->id], 'method'=>'delete',
                        'class'=>'form-restore','id'=>'form-restore' ))
                        !!}
                        <div class="text-center">
                          <h4 id="msg-shorten ">@lang('lang.restore') @lang('lang.folder')</h4>
                        </div>
                        <hr>
                        <p>@lang('lang.are_you_want')  @lang('lang.restore')
                          <b class="text-info">
                            {{$folder->slug}} </b> @lang('lang.folder') ?
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
                <h2 class="text-danger alert alert-info"> You don't have folders</h2>
              </center>
            </div>
            <div class="text-clear col-md-12">  </div>
            <div class="col-md-12 text-center">
              <a href="{{route('folder.create')}}" class="btn btn-success"> 
              <i class="fa fa-plus"></i>  Click to Add New folder
              </a>
            </div>
            @endif 
          </section>
        </section>
      </div>  
      @endsection
