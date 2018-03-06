@extends('layouts.layout')

@section('content')

<div class="col-md-12">
    <section class="lter box panel">
        <header class="box-header with-border text-center">
                <h3 class="box-title">
                    <i class="fa fa-file-o">
                    </i>   
                    @if(Route::is('file.index'))
                        @lang('lang.all') @lang('lang.Files')
                    @elseif(Route::is('file.deletedFiles'))
                        @lang('lang.all') @lang('lang.hidden_files')
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
          @if(count($files))
          <table id="DataTable" class="mdl-data-table table-hover table" cellspacing="0" width="100%">
          <div class="col-sm-3 " style="top:10px;">
           <a href="{{route('file.create')}}" type="button" class="btn btn-info btn-md">
            <i class="fa fa-file"></i>
            @lang('lang.add') @lang('lang.new_file')
           </a>
           </div>
             <thead>
             <tr>
                    <th>@lang('lang.Link')</th>
                    <th class="v-middle hidden-xs">@lang('lang.downloads')</th>
                    <th class="v-middle hidden-xs">@lang('lang.earnings')</th>
                    <th class="v-middle hidden-xs">@lang('lang.password')</th>
                    <th class="v-middle hidden-xs">@lang('lang.privacy')</th>
                    <th class="v-middle hidden-xs">@lang('lang.created_at')</th>
                    <th>@lang('lang.options')</th>
             </tr>
             </thead>
                <tfoot>
                <tr>
                        <th>@lang('lang.Link')</th>
                        <th >@lang('lang.downloads')</th>
                        <th class="v-middle hidden-xs">@lang('lang.earnings')</th>
                        <th class="v-middle hidden-xs">@lang('lang.password')</th>
                        <th class="v-middle hidden-xs">@lang('lang.privacy')</th>
                        <th class="v-middle hidden-xs">@lang('lang.created_at')</th>
                        <th>@lang('lang.options')</th>
                            </tr>
                </tfoot>
                <tbody>
                 @foreach ($files as $file)
                    <tr>
                        <td>
                            <a href="{{$file->shorted_url}}" class="h5 text-info" target="_blank">
                                <strong><i class="fa fa-file"></i> {{$file->shorted_url}}</strong>
                            </a>
                      <small class="text-muted block"><i class="fa fa-file-text"></i> 
                      {{$file->description}}
                      <button class="btn btn-xs text-info btn-copy pull-right" data-clipboard-text=" {{$file->shorted_url}}"  data-toggle="button">
                        <span class="text">
                        <i class="ion ion-ios-copy-outline"> </i> @lang('lang.copy')
                        </span>
                        <span class="text-active">
                        <i class="fa fa-check"> </i> @lang('lang.copied')
                        </span>
                    </button>
                      </small>
                        </td>
                        <td class="">
                        <a  href="{{route('file.show',$file->id)}}" class="btn btn-xs text-warning text-sm" target="_blank">
                        <i class="fa fa-eye"></i></a>
                        {{$file->downloads}}
                         <a href="{{url($file->path)}}"  class="btn btn-sm text-info" title="Download" 
                            download>
                                    <span class="text">
                                        <i class="fa fa-download" > </i>
                                    </span>
                                </a> 
                         </td>
                         <td class="v-middle hidden-xs">
             {{$file->earnings}}
              <span class="btn-xs text-success text-xs"> $</span> 
            </td>
                        <td class="v-middle hidden-xs">
                            @if($file->password)
                            <i class="fa fa-lock"></i> {{$file->password}}
                            @else 
                            <i class="fa fa-unlock"></i>
                            @endif
                        </td>
                        <td class="v-middle hidden-xs">
                             @if($file->isPrivate == 1)
                             <i class="fa fa-eye-slash"></i> @lang('lang.private')
                            @else 
                            <i class="fa fa-eye"></i> @lang('lang.public')
                            @endif
                            </td>
                        <td class="v-middle hidden-xs">{{$file->created_at}}</td>
                       
                        <td class="pull-right">
                           <a href="{{route('file.edit',$file->id)}}" title="Edit"  data-toggle="modal"
                            class="text-info">
                                <span class="text text-md" >
                                    <i class="fa  fa-edit">
                                    </i> 
                                </span>
                                 </a>
                                 @if(Route::is('file.index'))
                                 <a href="#delete-file-{{$file->id}}" title="Hide"  data-toggle="modal"
                                     class=" text-danger" >
                                     <span class="text  text-sm" >
                                         <i class="fa fa-eye-slash">
                                         </i> 
                                     </span>
                                 </a>
                                 @elseif(Route::is('file.deletedFiles'))
                                 <a href="#restore-file-{{$file->id}}" title="@lang('lang.restore')"  data-toggle="modal"
                                     class=" text-warning" >
                                     <span class="text text-sm">
                                         <i class="fa  fa-eye"> </i> 
                                     </span>
                                 </a>
                                 @endif 
                                
                        </td>
                    </tr>
                    @if(Route::is('file.index'))
                    <div class="modal fade" id="delete-file-{{$file->id}}">
                    @elseif(Route::is('file.deletedFiles'))
                    <div class="modal fade" id="restore-file-{{$file->id}}">
                    @endif 
                    <div class="modal-dialog modal-shorten">
                        <div class="modal-content bg-default">
                            <div class="modal-body">
                                <div class="padder">
                                @if(Route::is('file.index'))
                                {!! Form::open(array('route' =>['file.destroy',$file->id],'method'=>'delete','class'=>'form-delete','id'=>'form-delete' ))!!}
                                <div class="text-center">
                                        <h4 id="msg-shorten ">@lang('lang.hide') @lang('lang.file')</h4>
                                    </div>
                                    <hr>
                                    <p>   @lang('lang.are_you_want')  @lang('lang.hide') <b class="text-info">
                                    @elseif(Route::is('file.deletedFiles'))
                                <div class="text-center">
                                        <h4 id="msg-shorten ">   @lang('lang.restore')   @lang('lang.file')</h4>
                                    </div>
                                    <hr>
                                    <p>   @lang('lang.are_you_want') @lang('lang.restore') <b class="text-info">
                                    {!! Form::open(array('route' =>['file.restore',$file->id], 'method'=>'delete','class'=>'form-restore','id'=>'form-restore' ))!!}
                                @endif  
                                {{$file->slug}} </b>   @lang('lang.file') ?</p> 
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-rounded pull-left btn-default" data-dismiss="modal">
                                            cancle
                                        </button>
                                        @if(Route::is('file.index'))
                                        <button id="btn-delete" class="btn btn-rounded  pull-right btn-success" type="submit">
                                        <i class="fa fa-eye-slash"></i> @lang('lang.hide')
                                    </button>
                                        @elseif(Route::is('file.deletedFiles'))
                                        <button id="btn-delete" class="btn btn-rounded  pull-right btn-success" type="submit">
                                            <i class="fa fa-eye"></i> @lang('lang.restore')
                                        </button>
                                        @endif  
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                            
                 @endforeach
                 </tbody> 
           </table>
              @else
            <div class="col-md-8 col-md-offset-2">
             <center> 
                <h2 class="text-danger alert alert-info"> @lang('lang.dont_have') @lang('lang.Files')</h2>
             </center>
            </div>
           <div class="text-clear col-md-12">  </div>
            <div class="col-md-12 text-center">
                <a href="{{route('file.create')}}" class="btn btn-success"> 
                  <i class="fa fa-plus"></i>   @lang('lang.click_to')@lang('lang.add') @lang('lang.new_file')
                 </a>
            </div>
            @endif 
        </section>
    </section>
</div>  
@endsection
