@extends('layouts.layout')

@section('content')

<div class="col-md-12">
    <section class="lter box box-info">
        <header class="box-header with-border text-center">
                <h3 class="box-title">
                    <i class="fa fa-ticket-o">
                    </i>   
                    @if(Route::is('ticket.index'))
                    @lang('lang.all') @lang('lang.tickets')
                    @elseif(Route::is('ticket.deletedtickets'))
                    @lang('lang.all') @lang('lang.hidden_tickets')
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
                    @lang('lang.create')  @lang('lang.new_ticket') 
                </a>
            </div>
            <thead>
                <tr>
                    <th> @lang('lang.Subject') </th>
                    <th class="v-middle hidden-xs"> @lang('lang.Message') </th>
                    <th class="v-middle hidden-xs"> @lang('lang.Status') </th>
                    <th class="v-middle hidden-xs"> @lang('lang.created_at') </th>
                    <th> @lang('lang.options') </th>
                    </tr>
            </thead>
            <tfoot>
                <tr>
                    <th> @lang('lang.Subject') </th>
                    <th class="v-middle hidden-xs"> @lang('lang.Message') </th>
                    <th class="v-middle hidden-xs"> @lang('lang.Status') </th>
                    <th class="v-middle hidden-xs"> @lang('lang.created_at') </th>
                    <th> @lang('lang.options') </th>
                    </tr>
            </tfoot>
            <tbody>
                 @foreach ($tickets as $ticket)
                 <tr>
                    <td class="v-middle">
                        <a  href="{{route('ticket.show',$ticket->id)}}" class="btn btn-xs text-warning text-sm" target="_blank">
                        <i class="fa fa-eye"></i></a> {{$ticket->subject}}
                        </td>
                    <td class="v-middle hidden-xs" >{{$ticket->message}}</td>
                    

                    <td class="v-middle hidden-xs">
                        @if($ticket->isClosed == 1)
                            <b class="text-danger">
                                <i class="fa fa-lock"></i> 
                                @lang('lang.closed')
                            </b>
                        @else
                            <b class="text-success">
                                <i class="fa fa-unlock"></i> @lang('lang.opend')
                            </b>
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
                                        <h4 id="msg-shorten ">@lang('lang.hide') @lang('lang.ticket')</h4>
                                    </div>
                                    <hr>
                                    <p>@lang('lang.are_you_want') @lang('lang.hide') <b class="text-info">
                                    @elseif(Route::is('ticket.deletedtickets'))
                                <div class="text-center">
                                        <h4 id="msg-shorten ">@lang('lang.restore') @lang('lang.ticket') </h4>
                                    </div>
                                    <hr>
                                    <p>@lang('lang.are_you_want')  @lang('lang.restore')  <b class="text-info">
                                    {!! Form::open(array('route' =>['ticket.restore',$ticket->id], 'method'=>'delete','class'=>'form-restore','id'=>'form-restore' ))!!}
                                @endif  
                                {{$ticket->slug}} </b> @lang('lang.ticket')  ?</p> 
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-rounded pull-left btn-default" data-dismiss="modal">
                                            @lang('lang.cancle') 
                                        </button>
                                        @if(Route::is('ticket.index'))
                                        <button id="btn-delete" class="btn btn-rounded  pull-right btn-success" type="submit">
                                        <i class="fa fa-eye-slash"></i> @lang('lang.hide') 
                                    </button>
                                        @elseif(Route::is('ticket.deletedtickets'))
                                        <button id="btn-delete" class="btn btn-rounded  pull-right btn-success" type="submit">
                                            <i class="fa fa-eye"></i> @lang('lang.restore') 
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
                <h2 class="text-danger alert alert-info"> @lang('lang.dont_have')  @lang('lang.ticket') </h2>
             </center>
            </div>
           <div class="text-clear col-md-12">  </div>
            <div class="col-md-12 text-center">
                <a href="{{route('ticket.create')}}" class="btn btn-success"> 
                  <i class="fa fa-plus"></i>  @lang('lang.click_to')@lang('lang.add') @lang('lang.new_ticket') 
                 </a>
            </div>
            @endif 
        </section>
    </section>
</div>  
@endsection
