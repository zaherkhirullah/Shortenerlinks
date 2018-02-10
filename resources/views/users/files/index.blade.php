@extends('layouts.layout')

@section('content')

<div class="col-md-12">
    <section class="lter box box-info">
        <header class="box-header with-border text-center">
                <h3 class="box-title">
                    <i class="fa fa-file-o">
                    </i> All Your Files
                </h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
        </header>
            <!-- /.box-header -->
          
        <div class="footer b-t bg-white-only"> 
         <div class="col-md-3 " style="top:10px;">
            <a href="{{url('user/files/create')}}" type="button" class="btn btn-info btn-md">
             <i class="fa fa-file"></i>
               Add New File
            </a>
         </div>
           <div class="col-md-5 pull-right">
            <form class="m-t-sm">
                <div class="input-group">
                    <input type="text" class="input-sm form-control input-s-sm" placeholder="Search" disabled="">
                    <div class="input-group-btn">
                     <button class="btn btn-sm btn-default" >
                            <i class="fa fa-search">
                            </i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
      </div>
        <section class="box-body">   
          @if(count($files))
           <table class="table table-striped table-hover table-flip-scroll cf">
                <tbody>
                 @foreach ($files as $file)
                    <tr>
                        <td>
                            <a href="{{$file->shorted_url}}" class="h5 text-info" target="_blank">
                                <strong><i class="fa fa-file"></i> {{$file->shorted_url}}</strong>
                            </a>
                      <small class="text-muted block"><i class="fa fa-file-text"></i> {{$file->description}}
                      <button class="btn btn-xs text-info btn-copy pull-right" data-clipboard-text=" {{$file->shorted_url}}"  data-toggle="button">
                        <span class="text">
                            <i class="ion ion-ios-copy-outline"> </i> Copy
                        </span>
                        <span class="text-active">
                            Copied
                        </span>
                    </button>
                      </small>
                        </td>
                        <td class="v-middle hidden-xs"><i class="fa fa-eye"></i> {{$file->views}}</td>
                        <td class="v-middle hidden-xs"><i class="fa fa-download"></i> {{$file->downloads}}</td>
                        <td class="v-middle hidden-xs">
                            @if($file->password)
                            <i class="fa fa-lock"></i> {{$file->password}}
                            @else 
                            <i class="fa fa-unlock"></i>
                            @endif
                        </td>
                        <td class="v-middle hidden-xs">
                             @if($file->isPrivate == 1)
                             <i class="fa fa-eye-slash"></i> Private
                            @else 
                            <i class="fa fa-eye"></i> Public
                            @endif
                            </td>
                        <td class="v-middle hidden-xs">{{$file->created_at}}</td>
                        <td class="v-middle hidden-xs">
                            <div class="pos-rlt">
                            <a href="{{url($file->path)}}"  class="btn btn-sm text-info" title="Download" 
                            download>
                                    <span class="text">
                                        <i class="fa fa-download"> </i> Download
                                    </span>
                                    <span class="text-active">
                                       Downloaded
                                    </span>
                                </a>
                                 
                            </div>
                        </td>
                        <td class="pull-right">
                           <a href="{{route('files.edit',$file->id)}}" title="Edit"  data-toggle="modal"
                            class="text-info">
                                <span class="text" style="font-size:18px;">
                                    <i class="fa  fa-edit">
                                    </i> 
                                </span>
                                 </a>
                                 @if(Route::is('files.index'))
                                 <a href="#delete-file-{{$file->id}}" title="Hide"  data-toggle="modal"
                                     class=" text-danger" >
                                     <span class="text" style="font-size:18px;">
                                         <i class="fa fa-eye-slash">
                                         </i> 
                                     </span>
                                 </a>
                                 @elseif(Route::is('files.deletedFiles'))
                                 <a href="#restore-file-{{$file->id}}" title="Unhide"  data-toggle="modal"
                                     class=" text-warning" >
                                     <span class="text" style="font-size:18px;">
                                         <i class="fa  fa-eye"> </i> 
                                     </span>
                                 </a>
                                 @endif 
                                
                        </td>
                    </tr>
                    @if(Route::is('files.index'))
                    <div class="modal fade" id="delete-file-{{$file->id}}">
                    @elseif(Route::is('files.deletedFiles'))
                    <div class="modal fade" id="restore-file-{{$file->id}}">
                    @endif 
                    <div class="modal-dialog modal-shorten">
                        <div class="modal-content bg-default">
                            <div class="modal-body">
                                <div class="padder">
                                @if(Route::is('files.index'))
                                {!! Form::open(array('route' =>['files.destroy',$file->id],'method'=>'delete','class'=>'form-delete','id'=>'form-delete' ))!!}
                                <div class="text-center">
                                        <h4 id="msg-shorten ">Hide File</h4>
                                    </div>
                                    <hr>
                                    <p>Are You Sure You Want Hide <b class="text-info">
                                    @elseif(Route::is('files.deletedFiles'))
                                <div class="text-center">
                                        <h4 id="msg-shorten ">UnHide File</h4>
                                    </div>
                                    <hr>
                                    <p>Are You Sure You Want UnHide <b class="text-info">
                                    {!! Form::open(array('route' =>['files.restore',$file->id], 'method'=>'delete','class'=>'form-restore','id'=>'form-restore' ))!!}
                                @endif  
                                {{$file->slug}} </b> file ?</p> 
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-rounded pull-left btn-default" data-dismiss="modal">
                                            cancle
                                        </button>
                                        @if(Route::is('files.index'))
                                        <button id="btn-delete" class="btn btn-rounded  pull-right btn-success" type="submit">
                                        <i class="fa fa-eye-slash"></i> hide
                                    </button>
                                        @elseif(Route::is('files.deletedFiles'))
                                        <button id="btn-delete" class="btn btn-rounded  pull-right btn-success" type="submit">
                                            <i class="fa fa-eye"></i> UnHide
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
                <h2 class="text-danger alert alert-info"> You don't have files</h2>
             </center>
            </div>
           <div class="text-clear col-md-12">  </div>
            <div class="col-md-12 text-center">
                <a href="/user/files/create" class="btn btn-success"> 
                    Click to Add New file
                 </a>
            </div>
            @endif 
        </section>
    </section>
</div>  


@endsection
