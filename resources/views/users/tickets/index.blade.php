@extends('layouts.layout')

@section('content')

<div class="col-md-12">
    <section class="lter box box-info">
        <header class="box-header with-border text-center">
                <h3 class="box-title">
                    <i class="fa fa-ticket-o">
                    </i>   
                    @if(Route::is('ticket.index'))
                        All Your tickets
                    @elseif(Route::is('ticket.deletedtickets'))
                         All Your deleted tickets
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
          @if(count($tickets))
          <table id="DataTable" class="mdl-data-table table-hover table" cellspacing="0" width="100%">
          <div class="col-sm-3 " style="top:10px;">
           <a href="{{route('ticket.create')}}" type="button" class="btn btn-info btn-md">
            <i class="fa fa-ticket"></i>
              Add New ticket
           </a>
           </div>
             <thead>
             <tr>
              <th>Link</th>
              <th>views</th>
              <th>Downloads</th>
              <th>Earnings</th>
              <th>Password</th>
              <th>Privacy</th>
              <th>ceated date</th>
              <th>Options</th>
             </tr>
             </thead>
<tfoot>
<tr>
              <th>Link</th>
              <th>views</th>
              <th>Downloads</th>
              <th>Earnings</th>
              <th>Password</th>
              <th>Privacy</th>
              <th>ceated date</th>
              <th>Options</th>
             </tr>
</tfoot>
                <tbody>
                 @foreach ($tickets as $ticket)
                    <tr>
                        <td>
                            <a href="{{$ticket->shorted_url}}" class="h5 text-info" target="_blank">
                                <strong><i class="fa fa-ticket"></i> {{$ticket->shorted_url}}</strong>
                            </a>
                      <small class="text-muted block"><i class="fa fa-ticket-text"></i> 
                      {{$ticket->description}}
                      <button class="btn btn-xs text-info btn-copy pull-right" data-clipboard-text=" {{$ticket->shorted_url}}"  data-toggle="button">
                        <span class="text">
                        <i class="ion ion-ios-copy-outline"> </i> Copy
                        </span>
                        <span class="text-active">
                        <i class="fa fa-check"> </i> Copied
                        </span>
                    </button>
                      </small>
                        </td>
                        <td class="v-middle hidden-xs">
                        <a  href="{{route('ticket.show',$ticket->id)}}" class="btn btn-xs text-warning text-sm" target="_blank">
                        <i class="fa fa-eye"></i></a> {{$ticket->views}}
                        </td>
                        <td class="v-middle hidden-xs" >
                         {{$ticket->downloads}}
                         <a href="{{url($ticket->path)}}"  class="btn btn-sm text-info" title="Download" 
                            download>
                                    <span class="text">
                                        <i class="fa fa-download" > </i>
                                    </span>
                                </a> 
                         </td>
                         <td class="v-middle hidden-xs">
             {{$ticket->earnings}}
              <span class="btn-xs text-success text-xs"> $</span> 
            </td>
                        <td class="v-middle hidden-xs">
                            @if($ticket->password)
                            <i class="fa fa-lock"></i> {{$ticket->password}}
                            @else 
                            <i class="fa fa-unlock"></i>
                            @endif
                        </td>
                        <td class="v-middle hidden-xs">
                             @if($ticket->isPrivate == 1)
                             <i class="fa fa-eye-slash"></i> Private
                            @else 
                            <i class="fa fa-eye"></i> Public
                            @endif
                            </td>
                        <td class="v-middle hidden-xs">{{$ticket->created_at}}</td>
                       
                        <td class="pull-right">
                           <a href="{{route('ticket.edit',$ticket->id)}}" title="Edit"  data-toggle="modal"
                            class="text-info">
                                <span class="text text-md" >
                                    <i class="fa  fa-edit">
                                    </i> 
                                </span>
                                 </a>
                                 @if(Route::is('ticket.index'))
                                 <a href="#delete-ticket-{{$ticket->id}}" title="Hide"  data-toggle="modal"
                                     class=" text-danger" >
                                     <span class="text  text-sm" >
                                         <i class="fa fa-eye-slash">
                                         </i> 
                                     </span>
                                 </a>
                                 @elseif(Route::is('ticket.deletedtickets'))
                                 <a href="#restore-ticket-{{$ticket->id}}" title="Unhide"  data-toggle="modal"
                                     class=" text-warning" >
                                     <span class="text text-sm">
                                         <i class="fa  fa-eye"> </i> 
                                     </span>
                                 </a>
                                 @endif 
                                
                        </td>
                    </tr>
                    @if(Route::is('ticket.index'))
                    <div class="modal fade" id="delete-ticket-{{$ticket->id}}">
                    @elseif(Route::is('ticket.deletedtickets'))
                    <div class="modal fade" id="restore-ticket-{{$ticket->id}}">
                    @endif 
                    <div class="modal-dialog modal-shorten">
                        <div class="modal-content bg-default">
                            <div class="modal-body">
                                <div class="padder">
                                @if(Route::is('ticket.index'))
                                {!! Form::open(array('route' =>['ticket.destroy',$ticket->id],'method'=>'delete','class'=>'form-delete','id'=>'form-delete' ))!!}
                                <div class="text-center">
                                        <h4 id="msg-shorten ">Hide ticket</h4>
                                    </div>
                                    <hr>
                                    <p>Are You Sure You Want Hide <b class="text-info">
                                    @elseif(Route::is('ticket.deletedtickets'))
                                <div class="text-center">
                                        <h4 id="msg-shorten ">UnHide ticket</h4>
                                    </div>
                                    <hr>
                                    <p>Are You Sure You Want UnHide <b class="text-info">
                                    {!! Form::open(array('route' =>['ticket.restore',$ticket->id], 'method'=>'delete','class'=>'form-restore','id'=>'form-restore' ))!!}
                                @endif  
                                {{$ticket->slug}} </b> ticket ?</p> 
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-rounded pull-left btn-default" data-dismiss="modal">
                                            cancle
                                        </button>
                                        @if(Route::is('ticket.index'))
                                        <button id="btn-delete" class="btn btn-rounded  pull-right btn-success" type="submit">
                                        <i class="fa fa-eye-slash"></i> hide
                                    </button>
                                        @elseif(Route::is('ticket.deletedtickets'))
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
                <h2 class="text-danger alert alert-info"> You don't have tickets</h2>
             </center>
            </div>
           <div class="text-clear col-md-12">  </div>
            <div class="col-md-12 text-center">
                <a href="{{route('ticket.create')}}" class="btn btn-success"> 
                  <i class="fa fa-plus"></i>  Click to Add New ticket
                 </a>
            </div>
            @endif 
        </section>
    </section>
</div>  
@endsection
