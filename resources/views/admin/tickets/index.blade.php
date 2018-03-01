@extends('layouts.adlayout')
@section('content')
<div class="col-md-12">
    <section class="lter box box-info">
        <header class="box-header with-border text-center">
            <h3 class="box-title">
                <i class="fa fa-ticket-o">
                </i> @lang('lang.all')  @lang('lang.tickets') 
            </h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                </button>
            </div>
        </header>
        <!-- /.box-header -->
        <section class="box-body ">   
            @if(count($tickets))
            <table id="DataTable" class="mdl-data-table  table-hover" cellspacing="0" width="100%">
                <div class="col-md-3 " style="top:10px;">
                    <a href="{{route('tickets.create')}}" type="button" class="btn btn-success btn-md">
                            <i class="fa fa-plus-circle"></i>
                @lang('lang.add') @lang('lang.new_ticket')
                    </a>
                </div>
                <thead>
                    <tr>
                            <th><b class="text-muted">
                                    <i class="fa fa-user"></i></b>@lang('lang.username')</th>
                                <th>@lang('lang.Subject')</th>
                                <th>@lang('lang.Message')</th>
                                <th>@lang('lang.Status')</th>
                                <th>@lang('lang.created_at')</th>
                                <th>@lang('lang.options')</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                            <th><b class="text-muted">
                                    <i class="fa fa-user"></i></b>@lang('lang.username')</th>
                                <th>@lang('lang.Subject')</th>
                                <th>@lang('lang.Message')</th>
                                <th>@lang('lang.Status')</th>
                                <th>@lang('lang.created_at')</th>
                                <th>@lang('lang.options')</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($tickets as $ticket)
                    <tr>
                    
                        <td>{{$ticket->user->username }}</td>
                        <td>{{$ticket->subject }}</td>
                        <td>{{$ticket->message }}</td>
                    
                        <td>
                        <b class="text-success"><i class="fa fa-user"></i></b>  {{$ticket->user->first_name }} 
                            @if($ticket->isClosed == 0)
                            | <b class="text-success"><i class="fa fa-unlock"></i> @lang('lang.opend')</b>
                            @else  
                            | <b class="text-danger"><i class="fa fa-lock"></i>  @lang('lang.closed')</b>
                            @endif
                        </td>
                        <td>{{$ticket->created_at }}</td>

                        <td>
                            <a href="{{route('tickets.edit',$ticket->id)}}" data-toggle="modal" class="text-success" >
                                <span class="text">
                                    <i class="fa fa-edit"></i> 
                                </span>
                            </a>
                            <a href="#delete-link-{{$ticket->id}}" data-toggle="modal" class=" text-danger" >
                                <span class="text">
                                    <i class="fa fa-eye-slash"></i> 
                                </span>
                            </a>
                        </td>
                    </tr>
                    <div class="modal fade" id="delete-link-{{$ticket->id}}">
                        <div class="modal-dialog modal-shorten">
                            <div class="modal-content bg-default">
                                <div class="modal-body">
                                    <div class="padder">
                                        {!! Form::open(array('route' =>['tickets.destroy',$ticket->id],
                                        'method'=>'delete','class'=>'form-delete','id'=>'form-delete' )) !!}
                                        <div class="text-center">
                                            <h4 id="msg-shorten ">@lang('lang.hide') @lang('lang.ticket') </h4>
                                        </div>
                                        <p class="text-danger">@lang('lang.are_you_want') @lang('lang.hide')
                                            <b class="text-success">{{$ticket->subject}}</b> @lang('lang.ticket') ?</p> 
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-rounded pull-left btn-default" data-dismiss="modal">
                                                    @lang('lang.cancle') 
                                                </button>
                                                <button id="btn-delete" class="btn btn-rounded  pull-right btn-success" type="submit">
                                                    <i class="fa fa-eye-slash"></i> @lang('lang.hide')
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
                <h2 class="text-danger alert alert-warning"> @lang('lang.dont_have') @lang('lang.tickets')</h2>
            </center>
            </div>
            <div class="text-clear col-md-12">  </div>
            <div class="col-md-12 text-center">
                <a href="{{route('tickets.create')}}" class="btn btn-success"> 
                    @lang('lang.click_to') @lang('lang.add')  @lang('lang.new_ticket')
                </a>
            </div>
            @endif 
        </section>
    </section>
</div>  
@endsection
