@extends('layouts.adlayout')

@section('content')

<div class="col-md-12">
  <section class="lter box box-success">
    <header class="box-header with-border text-center">
      <h3 class="box-title">
        <i class="fa fa-adstype">
        </i> All Your adstypes
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
        <a href="{{route('adstypes.create')}}" type="button" class="btn btn-success btn-md">
          <i class="fa fa-adstype"></i>
          Add New adstype
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
      @if(count($adstypes))
      <table class="table table-striped table-hover table-flip-scroll cf">
        <tbody>
          @foreach ($adstypes as $adstype)
          <tr>
            <td>
                  <a href="{{$adstype->description }}" class="h5 text-success" target="_blank">
                    <strong>{{$adstype->name}}</strong>
                  </a>
                  <small class="text-muted block">{{$adstype->description}}</small>
                </td>
                <td class="v-middle hidden-xs">{{$adstype->created_at}}</td>
                <td class="v-middle hidden-xs">

                    <div class="pos-rlt">
                      <button class="btn btn-copy text-success" data-clipboard-text="{{$adstype->description}}"
                      data-toggle="button">
                      <span class="text">
                        <i style="font-size: 20px" class="ion ion-ios-copy-outline">
                        </i> COPY
                      </span>
                      <span class="text-active">
                      COPIED
                    </span>
                  </button>

                </div>
            </td>
            <td class="pull-right">
                <a href="{{route('adstypes.edit',$adstype->id)}}" data-toggle="modal"
                  class="text-success" >
                  <span class="text">
                    <i class="fa fa-2x fa-edit">
                    </i> 
                  </span>
                </a>
                <a href="#delete-adstype-{{$adstype->id}}" data-toggle="modal" class=" text-danger" >
                  <span class="text">
                    <i class="fa fa-2x fa-eye-slash">
                    </i> 
                  </span>
                </a>
            </td>
          </tr>
            <div class="modal fade" id="delete-adstype-{{$adstype->id}}">
              <div class="modal-dialog modal-hidden">
                <div class="modal-content bg-default">
                  <div class="modal-body">
                    <div class="padder">
                      {{ Form::open(array('route' =>['adstypes.destroy',$adstype->id],'method'=>'post',
                        'class'=>'form-delete','id'=>'form-delete' ))}}
                      
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}

                      <div class="text-center">
                        <h4 id="msg-hidden ">Hide  adstype</h4>
                      </div>
                      <p class="text-danger">Are You Sure You Want Hide
                      <b class="text-success">{{$adstype->slug}}</b> adstype ?</p> 
                      <div class="modal-footer">
                        <button type="button" class="btn btn-rounded pull-left btn-default" data-dismiss="modal">
                        cancle
                      </button>
                      <button id="btn-delete" class="btn btn-rounded  pull-right btn-success" type="submit">
                        <i class="fa fa-eye-slash"></i> Hide
                      </button>
                    </div>
                    {{ Form::close() }}
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
          <h2 class="text-danger alert alert-info"> You don't have adstypes</h2>
        </center>
      </div>
      <div class="text-clear col-md-12">  </div>
      <div class="col-md-12 text-center">
        <a href="{{route('adstypes.create')}}" class="btn btn-success"> 
          Click to Add New adstype
        </a>
      </div>
      @endif 
    </section>
  </section>
</div>  
@endsection
