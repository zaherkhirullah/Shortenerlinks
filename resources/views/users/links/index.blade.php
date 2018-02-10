@extends('layouts.layout')

@section('content')

<div class="col-md-12">
  <section class="lter box box-success">
    <header class="box-header with-border text-center">
      <h3 class="box-title">
        <i class="fa fa-link">
        </i> All Your links
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
        <a href="{{route('links.create')}}" type="button" class="btn btn-success btn-md">
          <i class="fa fa-link"></i>
          Add New link
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
      @if(count($links))
      <table class="table table-striped table-hover table-flip-scroll cf">
        <tbody>
          @foreach ($links as $link)
          <tr>
            <td>
              <a href="{{$link->shorted_url }}" class="h5 text-success" target="_blank">
                <strong>{{$link->shorted_url}}</strong>
                <button class="btn btn-sm btn-copy text-success pull-right" data-clipboard-text="{{$link->shorted_url}}"
                  data-toggle="button">
                  <span class="text">
                    <i style="font-size: 20px" class="ion ion-ios-copy-outline">
                    </i> COPY
                  </span>
                  <span class="text-active">
                    COPIED
                  </span>
                </button>
              </a>
              <small class="text-muted block">
              {{$link->url}}
              </small>
            </td>
            <td class="v-middle hidden-xs"><i class="fa fa-eye"></i> {{$link->clicks}}</td>
            <td class="v-middle hidden-xs">{{$link->created_at}}</td>
            <td class="pull-right">
              <a href="{{route('links.edit',$link->id)}}" title="Edit" data-toggle="modal"
                class="text-success" >
                <span class="text"  style="font-size:18px;">
                  <i class="fa fa-edit">
                  </i> 
                </span>
              </a>
              @if(Route::is('links.index'))
              <a href="#delete-link-{{$link->id}}" title="Hide"  data-toggle="modal"
                class=" text-danger" >
                <span class="text" style="font-size:18px;">
                  <i class="fa fa-eye-slash">
                  </i> 
                </span>
              </a>
              @elseif(Route::is('links.deletedLinks'))
              <a href="#restore-link-{{$link->id}}" title="Unhide"  data-toggle="modal"
                class="text-warning" >
                <span class="text" style="font-size:18px;">
                  <i class="fa fa-eye">
                  </i> 
                </span>
              </a>
              @endif

            </td>
          </tr>

          @if(Route::is('links.index'))
          <div class="modal fade" id="delete-link-{{$link->id}}">
            <div class="modal-dialog modal-shorten">
              <div class="modal-content bg-default">
                <div class="modal-body">
                  <div class="padder">
                    {!! Form::open(array('route' =>['links.destroy',$link->id],'method'=>'delete','class'=>'form-delete','id'=>'form-delete' ))!!}
                    <div class="text-center">
                      <h4 id="msg-shorten ">Hide link</h4>
                    </div>
                    <hr>
                    <p>Are You Sure You Want Hide 
                      <b class="text-info">
                        {{$link->slug}} </b> link ?</p> 
                        <div class="modal-footer">
                          <button type="button" class="btn btn-rounded pull-left btn-default" data-dismiss="modal">
                            cancle
                          </button>

                          <button id="btn-delete" class="btn btn-rounded  pull-right btn-success" type="submit">
                            <i class="fa fa-eye-slash"></i> hide
                          </button>
                        </div>

                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @elseif(Route::is('links.deletedLinks'))
              <div class="modal fade" id="restore-link-{{$link->id}}">
                <div class="modal-dialog modal-shorten">
                  <div class="modal-content bg-default">
                    <div class="modal-body">
                      <div class="padder">
                        {!! Form::open(array('route' =>['links.restore',$link->id], 'method'=>'delete',
                        'class'=>'form-restore','id'=>'form-restore' ))
                        !!}
                        <div class="text-center">
                          <h4 id="msg-shorten ">UnHide link</h4>
                        </div>
                        <hr>
                        <p>Are You Sure You Want UnHide
                          <b class="text-info">
                            {{$link->slug}} </b> link ?
                          </p> 
                          <div class="modal-footer">
                            <button type="button" class="btn btn-rounded pull-left btn-default" data-dismiss="modal">
                              cancle
                            </button>
                            <button id="btn-delete" class="btn btn-rounded  pull-right btn-success" type="submit">
                              <i class="fa fa-eye"></i> UnHide
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
                <h2 class="text-danger alert alert-info"> You don't have links</h2>
              </center>
            </div>
            <div class="text-clear col-md-12">  </div>
            <div class="col-md-12 text-center">
              <a href="{{route('links.create')}}" class="btn btn-success"> 
                Click to Add New link
              </a>
            </div>
            @endif 
          </section>
        </section>
      </div>  
      @endsection
