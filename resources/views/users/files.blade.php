@extends('layouts.layout')

@section('content')

<div class="col-md-12">
        <section class="vbox lter box box-info">
            <header class="box-header with-border">
                <h3 class="box-title">
                    <i class="fa fa-file-o">
                    </i> All Your Files
                </h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            </header>
            <!-- /.box-header -->
            <div class="footer b-t bg-white-only">
                <form class="m-t-sm">
                    <div class="input-group">
                        <input type="text" class="input-sm form-control input-s-sm" placeholder="Search" disabled="">
                        <div class="input-group-btn">
                            <button class="btn btn-sm btn-default" disabled="">
                                <i class="fa fa-search">
                                </i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <!--/ SEARCH BOX -->

                <section class="scrollable hover">
                    <table class="table table-striped table-hover table-flip-scroll cf">
                        <tbody>
                            @for ($i = 0; $i < 10; $i++)
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
                                                <i class="fa fa-download">
                                                </i> Download
                                            </span>
                                            <span class="text-active">
                                                <i class="fa fa-check">
                                                </i> Download
                                            </span>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <a href="#edit-file" data-toggle="modal"
                                    class="btn btn-info text-muted" >
                                        <span class="text">
                                            <i class="fa fa-edit">
                                            </i> 
                                        </span>
                                         </a>
                                        <a href="#delete-file" data-toggle="modal"
                                        class="btn btn-danger text-muted" >
                                        <span class="text">
                                            <i class="fa fa-trash">
                                            </i> 
                                        </span>
                                    </a>
                                </td>
                             </tr>
                             @endfor
                         </tbody>
                     </table>
                </section>
        </section>
</div>  
<div class="modal fade" id="delete-file">
    <div class="modal-dialog modal-shorten">
        <div class="modal-content bg-danger">
            <div class="modal-body">
                <div class="padder">
                    {!! Form::open(array ('route' => 'deletefile', 'method'  => 'delete','class'  => 'form-delete'  ,'id'  => 'form-delete' )) !!}

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
