  @extends('layouts.adlayout')

  @section('content')

  <div class="col-md-12">
  <section class="lter box box-success">
    <header class="box-header with-border text-center">
      <h3 class="box-title">
        <i class="fa fa-link">
        </i>
        @if(Route::is('links.index'))
              All Your links
        @elseif(Route::is('links.deletedLinks'))
              All Your deleted links
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
      @if(count($links))
      <table id="DataTable" class="mdl-data-table table-bordered table-hover" cellspacing="0" width="100%">

  <div class="col-md-3 " style="top:10px;">
  <a href="{{url('admin/links/create')}}" type="button" class="btn btn-success btn-md">
    <i class="fa fa-link"></i>
    Add New link
  </a>
  </div>

  <thead>
  <tr>
    <th>Shorted Link</th>
    <th>Details</th>
    <th>Created date</th>
    <th>Options</th>
  </tr>
  </thead>
  <tfoot>
  <tr>
    <th>Shorted Link</th>
    <th>Details</th>
    <th>Created date</th>
    <th>Options</th>
  </tr>
  </tfoot>
  <tbody>
  @foreach ($links as $link)
  <tr>
    <td> 
    <span class="pull-right">
        <a href="{{$link->shorted_url }}" class="h5 text-success" target="_blank">
                <strong>{{$link->shorted_url}}</strong>
        </a>
      <small class="text-info block">{{$link->url}}</small>
      </span>
      <span class="pull-left">
      <a class="btn btn-success btn-copy btn-xs " data-clipboard-text="{{$link->shorted_url}}" data-toggle="button">
          <span class="text">
              <i style="font-size: 20px" class="ion ion-ios-copy-outline"></i> copy
          </span>
          <span class="text-active">
                copied
          </span>
        </a>
      </span>
    </td>
    <td>
      <b class="text-success"><i class="fa fa-user"></i></b>  {{$link->user->first_name }}
    | <b class="text-success"><i class="fa fa-folder-o"></i></b> {{$link->domain->name }}
    | <b class="text-success"><i class="fa fa-folder"></i></b>  {{$link->folder->name }}
    </td>
    <td>{{$link->created_at }}</td>
    <td class="text-center">
    
  <dt>
      <a href="{{route('links.edit',$link->id)}}" title="Edit" class="text-success" >
        <span class="text text-md" >
          <i class="fa fa-edit"></i> 
        </span>
      </a>
      <a href="#delete-link-{{$link->id}}" title="Delete" data-toggle="modal" class=" text-danger" >
        <span class="text text-md" >
          <i class="fa  fa-trash"></i> 
        </span>	
      </a>
      @if(Route::is('links.index'))
      <a href="#hide-link-{{$link->id}}" title="Hide" data-toggle="modal" class=" text-primary" >
        <span class="text text-md" >
          <i class="fa  fa-eye-slash"></i> 
        </span>	
      </a>
      
        @elseif(Route::is('links.deletedLinks'))
        <a href="#restore-link-{{$link->id}}" title="UnHide" data-toggle="modal" class=" text-warning" >
        <span class="text text-md" >
          <i class="fa  fa-eye"></i> 
        </span>	
      </a>
        @endif  
      
  </dt>
</td>   
  </tr>
  <div class="modal fade" id="delete-link-{{$link->id}}">
              <div class="modal-dialog modal-shorten">
                <div class="modal-content bg-default">
                <div class="modal-body">
                  <div class="padder">
                    {!! Form::open(array('route' =>['links.destroy',$link->id],
                    'method'=>'delete','class'=>'form-delete','id'=>'form-delete' )) !!}

                    <div class="text-center">
                      <h4 id="msg-shorten ">Delete Shorten link</h4>
                    </div>
                    <p class="text-danger">Are You Sure You Want Delete
                      <b class="text-success">{{$link->slug}}</b> link ?</p> 
                      <div class="modal-footer">
                        <button type="button" class="btn btn-rounded pull-left btn-default" data-dismiss="modal">
                          cancle
                        </button>
                        <button id="btn-delete" class="btn btn-rounded  pull-right btn-success" type="submit">
                          <i class="fa fa-trash"></i> Delete
                        </button>
                      </div>
                      {!! Form::close() !!}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @if(Route::is('links.index'))
            <div class="modal fade" id="hide-link-{{$link->id}}">
              <div class="modal-dialog modal-shorten">
                <div class="modal-content bg-default">
                <div class="modal-body">
                  <div class="padder">
                    {!! Form::open(array('route' =>['links.destroy',$link->id],
                    'method'=>'delete','class'=>'form-delete','id'=>'form-delete' )) !!}

                    <div class="text-center">
                      <h4 id="msg-shorten ">Hidden Shorten link</h4>
                    </div>
                    <p class="text-danger">Are You Sure You Want Hidden
                      <b class="text-success">{{$link->slug}}</b> link ?</p> 
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
          @elseif(Route::is('links.deletedLinks'))
              <div class="modal fade" id="restore-link-{{$link->id}}">
                <div class="modal-dialog modal-shorten">
                  <div class="modal-content bg-default">
                    <div class="modal-body">
                        <div class="padder">
                          {!! Form::open(array('route' =>['link.restore',$link->id], 'method'=>'post',
                          'class'=>'form-restore','id'=>'form-restore' ))
                          !!}
                          <div class="text-center">
                            <h4 id="msg-shorten ">UnHidden link</h4>
                          </div>
                          <hr>
                          <p>Are You Sure You Want UnHidden
                            <b class="text-info">
                              {{$link->slug}} </b> link ?
                            </p> 
                            <div class="modal-footer">
                              <button type="button" class="btn btn-rounded pull-left btn-default" data-dismiss="modal">
                                cancle
                              </button>
                              <button id="btn-restore" class="btn btn-rounded  pull-right btn-success" type="submit">
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
    <h2 class="text-danger alert alert-warning"> You don't have links</h2>
  </center>
  </div>
  @if(Route::is('links.index'))
  <div class="col-md-12 text-center">
  <a href="{{url('admin/links/create')}}" class="btn btn-success"> 
    <i class="fa fa-plus"></i>   Click to Add New link
  </a>
  </div>
  @endif 
  @endif 
  </section>
  </section>
  </div>  
  @endsection
