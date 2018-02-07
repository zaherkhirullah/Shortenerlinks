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
            <!--/ SEARCH BOX -->
        <section class="box-body">   
          @if(count($files))
           <table class="table table-striped table-hover table-flip-scroll cf">
                <tbody>
                 @foreach ($files as $file)
                    <tr>
                        <td>
                            <a href="http://ouo.io/8qRygF" class="h5 text-info" target="_blank">
                                <strong>http://ouo.io/8qRygF</strong>
                            </a>
                            <small class="text-muted block">http://www.tettt.ka</small>
                        </td>
                        <td class="v-middle hidden-xs">2017-09-04</td>
                        <td class="v-middle hidden-xs">
                            <div class="pos-rlt">
                                <button class="btn btn-Download text-info" data-clipboard-text="http://ouo.io/8qRygF" data-toggle="button">
                                    <span class="text">
                                        <i class="fa fa-download"> </i> Download
                                    </span>
                                    <span class="text-active">
                                       Downloaded
                                    </span>
                                </button>
                            </div>
                        </td>
                        <td class="pull-right">
                           <a href="#edit-file" data-toggle="modal"
                            class="btn btn-xs btn-info text-muted" >
                                <span class="text">
                                    <i class="fa fa-edit">
                                    </i> 
                                </span>
                                 </a>
                                <a href="#delete-file" data-toggle="modal"
                                class="btn btn-xs btn-danger text-muted" >
                                <span class="text">
                                    <i class="fa fa-trash">
                                    </i> 
                                </span>
                            </a>
                        </td>
                    </tr>
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
<div class="modal fade" id="delete-file">
    <div class="modal-dialog modal-shorten">
        <div class="modal-content bg-danger">
            <div class="modal-body">
                <div class="padder">
                    {!! Form::open($deleteform) !!}

                    <h4 id="msg-shorten">Delete Shorten File</h4>
                    <p>Are You Sure You Want Delete This item ?</p> 
                    <div class="modal-footer">
                        <button type="button" class="btn btn-rounded pull-left btn-default" data-dismiss="modal">
                            <i class="fa fa-remove"></i> cancle
                        </button>
                        <button id="btn-delete" class="btn btn-rounded  pull-right btn-success" type="submit">
                            <i class="fa fa-trash"></i> confirm
                        </button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
