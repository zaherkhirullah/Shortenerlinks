@extends('layouts.adlayout')
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
        <section class="box-body ">   
          @if(count($files))
          <table id="DataTable" class="mdl-data-table  table-hover" cellspacing="0" width="100%">
            <div class="col-md-3 " style="top:10px;">
                <a href="{{route('files.create')}}" type="button" class="btn btn-success btn-md">
                    <i class="fa fa-plus"></i>   Add New file
                </a>
            </div>
            <thead>
                <tr>
                    <th>file</th>
                    <!-- <th>Title</th> -->
                    <th>Description</th>
                    <!-- <th>Views</th> -->
                    <th>Downloads</th>
                    <!-- <th>Privacy</th> -->
                    <!-- <th>Password</th> -->
                    <th>Details</th>
                    <th>Created date</th>
                    <!-- <th>Update date</th> -->
                    <th>Options</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>file</th>
                    <!-- <th>Title</th> -->
                    <th>Description</th>
                    <!-- <th>Views</th> -->
                    <th>Downloads</th>
                    <!-- <th>Privacy</th> -->
                    <!-- <th>Password</th> -->
                    <th>Created date</th>
                    <!-- <th>Update date</th> -->
                    <th>Options</th>
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
                          <i class="ion ion-ios-copy-outline"> </i> Copy
                      </span>
                      <span class="text-active">
                          Copied
                      </span>
                  </a>
                  <a class="btn btn-xs text-info btn-copy" href="{{url($file->path)}}" title="Download"  download>
                      <span class="text">
                          <i class="fa fa-download"> </i> Download
                      </span>
                      <span class="text-active">
                      Downloaded
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
                         | <b class="text-success"><i class="fa fa-eye"></i></b> public
                        @else  
                         | <b class="text-success"><i class="fa fa-eye-slash"></i></b>  private
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
                              <a href="{{route('files.edit',$file->id)}}" title="Edit" class="text-info" >
                                <span class="text text-md" >
                                <i class="fa fa-edit"></i> 
                                </span>
                              </a>
                              @if(Route::is('files.index'))
                                <a href="#hide-file-{{$file->id}}" title="Hide" data-toggle="modal" class=" text-primary" >
                                  <span class="text text-md" >
                                    <i class="fa  fa-eye-slash"></i> 
                                  </span>	
                                </a>
                                
                              @elseif(Route::is('files.deletedFiles'))
                                  <a href="#restore-file-{{$file->id}}" title="UnHide" data-toggle="modal" class=" text-warning" >
                                  <span class="text text-md" >
                                    <i class="fa  fa-eye"></i> 
                                  </span>	
                                </a>
                              @endif  
                                <a href="#delete-file-{{$file->id}}" title="Delete" data-toggle="modal" class=" text-danger" >
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
                                          <h4 id="msg-shorten ">Delete file</h4>
                                        </div>
                                        <p class="text-danger">Are You Sure You Want Delete
                                          <b class="text-success">{{$file->slug}}</b> file ?</p> 
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-rounded pull-left btn-default" data-dismiss="modal">
                                              cancle
                                            </button>
                                            <button id="btn-delete" class="btn btn-rounded  pull-right btn-success" type="submit">
                                              <i class="fa fa-trash"></i> Delete
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
                                            <h4 id="msg-shorten ">Hidden Shorten file</h4>
                                          </div>
                                          <p class="text-danger">Are You Sure You Want Hidden
                                            <b class="text-success">{{$file->slug}}</b> file ?</p> 
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-rounded pull-left btn-default" data-dismiss="modal">
                                                cancle
                                              </button>
                                              <button id="btn-delete" class="btn btn-rounded  pull-right btn-success" type="submit">
                                                <i class="fa fa-eye-slash"></i> Hide
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
                                            <h4 id="msg-shorten ">UnHidden file</h4>
                                          </div>
                                          <hr>
                                          <p>Are You Sure You Want UnHidden
                                            <b class="text-info">
                                              {{$file->slug}} </b> file ?
                                            </p> 
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-rounded pull-left btn-default" data-dismiss="modal">
                                                cancle
                                              </button>
                                              <button id="btn-restore" class="btn btn-rounded  pull-right btn-success" type="submit">
                                                <i class="fa fa-eye"></i> UnHide
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
                    <h2 class="text-danger alert alert-warning"> You don't have files</h2>
                @else
                    <h2 class="text-danger alert alert-warning"> You don't have Hidden files</h2>
                @endif
            </center>
            </div>
            @if(Route::is('files.index'))
            <div class="text-clear col-md-12">  </div>
            <div class="col-md-12 text-center">
                <a href="{{route('files.create')}}" class="btn btn-success"> 
                <i class="fa fa-plus"></i>  Click to Add New file
                </a>
            </div>
            @endif 
            @endif 
        </section>
    </section>
</div>  
@endsection
