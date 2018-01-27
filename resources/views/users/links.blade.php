@extends('layouts.layout')

@section('content')

<section class="col-md-8">
    <section class="vbox lter box box-info">       
        <header class="box-header with-border">
            <h3 class="box-title">
                <i class="fa fa-link">
                </i> All Your Links
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
        <div class="footer b-t bg-white-only">
            <div class="col-md-5 pull-right">
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
        </div>
        <!-- /.box-header -->
        <section class="box-body scrollable hover">
            <table class="table table-striped table-hover table-flip-scroll cf">
                <tbody>
                    @for ($i = 0; $i < 10; $i++)
                    <tr>
                        <td>
                            <a href="http://ouo.io/8qRygF" class="h5 text-success" target="_blank">
                                <strong>http://ouo.io/8qRygF</strong>
                            </a>
                            <small class="text-muted block">http://www.tettt.ka</small>
                        </td>
                        <td class="v-middle hidden-xs">2017-09-04</td>
                        <td class="v-middle hidden-xs">

                            <div class="pos-rlt">
                                <button class="btn btn-copy text-success" data-clipboard-text="http://ouo.io/8qRygF" data-toggle="button">
                                    <span class="text">
                                        <i class="fa fa-heart-o">
                                        </i> COPY
                                    </span>
                                    <span class="text-active">
                                        <i class="fa fa-check">
                                        </i> COPY
                                    </span>
                                </button>
                             
                            </div>
                        </td>
                        <td>
                               <a href="#edit-link" data-toggle="modal"
                                class="btn btn-info text-muted" >
                                <span class="text">
                                    <i class="fa fa-edit">
                                    </i> 
                                </span>
                            </a>
                               <a href="#delete-link" data-toggle="modal"
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
        <div class="modal fade" id="delete-link">
            <div class="modal-dialog modal-shorten">
                <div class="modal-content bg-danger">
                    <div class="modal-body">
                        <div class="padder">
                            {!! Form::open(array ('route' => 'deletelink', 'method'  => 'delete','class'  => 'form-delete'  ,'id'  => 'form-delete' )) !!}

                            <h4 id="msg-shorten">Delete Shorten Link</h4>
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

        <footer class="footer hidden-xs">
        </footer>
      </section>
    </section>
</section>
@endsection
