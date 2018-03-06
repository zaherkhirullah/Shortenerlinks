@extends('layouts.adlayout')
@section('content')
<div class="col-md-12">
    <section class="lter box panel">
        <header class="box-header with-border text-center">
            <h3 class="box-title">
                <i class="fa fa-file-o">
                </i>  @lang('lang.all')  @lang('lang.Files') 
            </h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                </button>
            </div>
        </header>
        <!-- /.box-header -->
        <section class="box-body ">   
          @if(count($files))
          <table id="DataTable" class="mdl-data-table  table-hover" cellspacing="0" width="100%">
            <div class="col-md-3 " style="top:10px;">
                <a href="{{route('files.create')}}" type="button" class="btn btn-success btn-md">
                    <i class="fa fa-plus-circle"></i>
                      @lang('lang.add')  @lang('lang.new_file') 
                </a>
            </div>
            <thead>
                <tr>
                    <th> @lang('lang.File')</th>
                    {{--  <!-- <th>@lang('title')</th> -->  --}}
                    <th class="v-middle hidden-xs"> @lang('lang.description')</th>
                    {{--  <!-- <th> @lang('lang.views')</th> -->  --}}
                    <th class="v-middle hidden-xs"> @lang('lang.downloads')</th>
                    {{--  <!-- <th> @lang('lang.Privacy')</th> -->
                    <!-- <th> @lang('lang.password')</th> -->  --}}
                    <th class="v-middle hidden-xs"> @lang('lang.Details')</th>
                    <th class="v-middle hidden-xs"> @lang('lang.created_at')</th>
                    {{--  <th> @lang('lang.updated_at')</th>  --}}
                    <th> @lang('lang.options')</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th> @lang('lang.File')</th>
                    {{--  <!-- <th>@lang('title')</th> -->  --}}
                    <th class="v-middle hidden-xs"> @lang('lang.description')</th>
                    {{--  <!-- <th> @lang('lang.views')</th> -->  --}}
                    <th class="v-middle hidden-xs"> @lang('lang.downloads')</th>
                    {{--  <!-- <th> @lang('lang.Privacy')</th> -->
                    <!-- <th> @lang('lang.password')</th> -->  --}}
                    <th class="v-middle hidden-xs"> @lang('lang.Details')</th>
                    <th class="v-middle hidden-xs"> @lang('lang.created_at')</th>
                    {{--  <th> @lang('lang.updated_at')</th>  --}}
                    <th> @lang('lang.options')</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($files as $file)
                <tr>
                    <td>
                    
                        <a href="{{$file->shorted_url}}" class="h5 text-info" target="_blank">
                            <strong>{{$file->shorted_url}}</strong>
                            <dt>
                    <small class="text-muted block">
                    <a class="btn btn-xs text-info btn-copy" data-clipboard-text=" {{$file->shorted_url}}"  data-toggle="button">
                      <span class="text">
                          <i class="ion ion-ios-copy-outline"> </i> @lang('lang.copy')
                      </span>
                      <span class="text-active">
                          @lang('lang.copied')
                      </span>
                  </a>
                  <a class="btn btn-xs text-info btn-copy" href="{{url($file->path)}}" title="Download"  download>
                      <span class="text">
                          <i class="fa fa-download"> </i> @lang('lang.download')
                      </span>
                      <span class="text-active">
                          @lang('lang.downloaded')
                      </span>
                  </a>
                        </small>
                           
                        </dt>
                        </a>
                    </td>
                    
                    <!-- <td>{{$file->title }}</td> -->
                    <td>{{$file->description }}</td>
                    <!-- <td>{{$file->views }}</td> -->
                    <td>{{$file->downloads }}</td>
                  
                    <td>
                    <b class="text-success"><i class="fa fa-user"></i></b>  {{$file->user->first_name }} 
                        @if($file->isPrivate == 0)
                         | <b class="text-success"><i class="fa fa-eye"></i></b>@lang('lang.public') 
                        @else  
                         | <b class="text-success"><i class="fa fa-eye-slash"></i></b>@lang('lang.private')  
                        @endif
                       
                       @if($file->password)
                        | <b class="text-success"><i class="fa fa-lock"></i></b> {{$file->password}}
                       @else 
                        | <b class="text-success"><i class="fa fa-unlock"></i></b>
                       @endif
                        | <b class="text-success"><i class="fa fa-folder"></i></b>  {{$file->folder->name }}
                    </td>
                    
                    <td>{{$file->created_at }}</td>
                    <!-- <td>{{$file->updated_at }}</td>                   -->

                    <td class="text-center">
                            <dt>
                              <a href="{{route('files.edit',$file->id)}}" title="@lang('lang.edit') " class="text-info" >
                                <span class="text text-md" >
                                <i class="fa fa-edit"></i> 
                                </span>
                              </a>
                              @if(Route::is('files.index'))
                                <a href="#hide-file-{{$file->id}}" title="@lang('lang.hide') " data-toggle="modal" class=" text-primary" >
                                  <span class="text text-md" >
                                    <i class="fa  fa-eye-slash"></i> 
                                  </span>	
                                </a>
                                
                              @elseif(Route::is('files.deletedFiles'))
                                  <a href="#restore-file-{{$file->id}}" title="@lang('lang.restore') " data-toggle="modal" class=" text-warning" >
                                  <span class="text text-md" >
                                    <i class="fa  fa-eye"></i> 
                                  </span>	
                                </a>
                              @endif  
                                <a href="#delete-file-{{$file->id}}" title="@lang('lang.delete') " data-toggle="modal" class=" text-danger" >
                                  <span class="text text-md" >
                                    <i class="fa  fa-trash"></i> 
                                  </span>	
                                </a>
                            </dt>
                          </td>   
                        </tr>
                                <div class="modal fade" id="delete-file-{{$file->id}}">
                                  <div class="modal-dialog modal-shorten">
                                    <div class="modal-content bg-default">
                                    <div class="modal-body">
                                      <div class="padder">
                                        {{Form::open(array('route' =>['files.destroy',$file->id],
                                        'method'=>'delete','class'=>'form-delete','id'=>'form-delete' )) }}
                      
                                        <div class="text-center">
                                          <h4 id="msg-shorten ">@lang('lang.delete')  @lang('lang.file') </h4>
                                        </div>
                                        <p class="text-danger">@lang('lang.are_you_wont')  @lang('lang.delete')
                                          <b class="text-success">{{$file->slug}}</b> @lang('lang.file') ?</p> 
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-rounded pull-left btn-default" data-dismiss="modal">
                                                @lang('lang.cancle')
                                            </button>
                                            <button id="btn-delete" class="btn btn-rounded  pull-right btn-success" type="submit">
                                              <i class="fa fa-trash"></i> @lang('lang.delete')
                                            </button>
                                          </div>
                                          {{Form::close() }}
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                @if(Route::is('files.index'))
                                  <div class="modal fade" id="hide-file-{{$file->id}}">
                                    <div class="modal-dialog modal-shorten">
                                      <div class="modal-content bg-default">
                                      <div class="modal-body">
                                        <div class="padder">
                                          {{Form::open(array('route' =>['files.delete',$file->id],
                                          'method'=>'delete','class'=>'form-delete','id'=>'form-delete' )) }}
                      
                                          <div class="text-center">
                                            <h4 id="msg-shorten "> @lang('lang.hidden_files')</h4>
                                          </div>
                                          <p class="text-danger">@lang('lang.are_you_wont')   @lang('lang.hide')
                                            <b class="text-success">{{$file->slug}}</b>  @lang('lang.file') ?</p> 
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-rounded pull-left btn-default" data-dismiss="modal">
                                                  @lang('lang.cancle')
                                              </button>
                                              <button id="btn-delete" class="btn btn-rounded  pull-right btn-success" type="submit">
                                                <i class="fa fa-eye-slash"></i>  @lang('lang.hide')
                                              </button>
                                            </div>
                                            {{Form::close() }}
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                @elseif(Route::is('files.deletedFiles'))
                                <div class="modal fade" id="restore-file-{{$file->id}}">
                                  <div class="modal-dialog modal-shorten">
                                    <div class="modal-content bg-default">
                                      <div class="modal-body">
                                        <div class="padder">
                                          {{Form::open(array('route' =>['files.restore',$file->id], 'method'=>'post',
                                          'class'=>'form-restore','id'=>'form-restore' ))
                                          }}
                                          <div class="text-center">
                                            <h4 id="msg-shorten "> @lang('lang.restore')  @lang('lang.file')</h4>
                                          </div>
                                          <hr>
                                          <p>@lang('lang.are_you_wont')   @lang('lang.restore')
                                            <b class="text-info">
                                              {{$file->slug}} </b> @lang('lang.file') ?
                                            </p> 
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-rounded pull-left btn-default" data-dismiss="modal">
                                                  @lang('lang.cancle')
                                              </button>
                                              <button id="btn-restore" class="btn btn-rounded  pull-right btn-success" type="submit">
                                                <i class="fa fa-eye"></i> @lang('lang.restore')
                                              </button>
                                            </div>
                                            {{Form::close() }}
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
                @if(Route::is('files.index'))
                    <h2 class="text-danger alert alert-warning"> @lang('lang.dont_have') @lang('lang.files')</h2>
                @else
                    <h2 class="text-danger alert alert-warning"> @lang('lang.dont_have') @lang('lang.hidden_files')</h2>
                @endif
            </center>
            </div>
            @if(Route::is('files.index'))
            <div class="text-clear col-md-12">  </div>
            <div class="col-md-12 text-center">
                <a href="{{route('files.create')}}" class="btn btn-success"> 
                <i class="fa fa-plus"></i>  @lang('lang.click_to') @lang('lang.add')  New file
                </a>
            </div>
            @endif 
            @endif 
        </section>
    </section>
</div>  
@endsection
