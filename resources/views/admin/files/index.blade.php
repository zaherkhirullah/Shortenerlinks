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
                    <i class="fa fa-link"></i>
                    Add New file
                </a>
            </div>
            <thead>
                <tr>
                    <th>Link</th>
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
                    <th>Link</th>
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

                    <td>
                        <a href="{{route('files.edit',$file->id)}}" data-toggle="modal" class="text-success" >
                            <span class="text">
                                <i class="fa fa-edit"></i> 
                            </span>
                        </a>
                        <a href="#delete-link-{{$file->id}}" data-toggle="modal" class=" text-danger" >
                            <span class="text">
                                <i class="fa fa-eye-slash"></i> 
                            </span>
                        </a>
                    </td>
                </tr>
                <div class="modal fade" id="delete-link-{{$file->id}}">
                    <div class="modal-dialog modal-shorten">
                        <div class="modal-content bg-default">
                            <div class="modal-body">
                                <div class="padder">
                                    {!! Form::open(array('route' =>['files.destroy',$file->id],
                                    'method'=>'delete','class'=>'form-delete','id'=>'form-delete' )) !!}
                                    <div class="text-center">
                                        <h4 id="msg-shorten ">Hide Shorten link</h4>
                                    </div>
                                    <p class="text-danger">Are You Sure You Want Hide
                                        <b class="text-success">{{$file->slug}}</b> link ?</p> 
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-rounded pull-left btn-default" data-dismiss="modal">
                                                cancle
                                            </button>
                                            <button id="btn-delete" class="btn btn-rounded  pull-right btn-success" type="submit">
                                                <i class="fa fa-eye-slash"></i> Hide
                                            </button>
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
                <h2 class="text-danger alert alert-warning"> You don't have files</h2>
            </center>
            </div>
            <div class="text-clear col-md-12">  </div>
            <div class="col-md-12 text-center">
                <a href="{{route('files.create')}}" class="btn btn-success"> 
                    Click to Add New file
                </a>
            </div>
            @endif 
        </section>
    </section>
</div>  
@endsection
