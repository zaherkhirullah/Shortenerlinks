@extends('layouts.adlayout')
@section('content')
<div class="col-md-12">
    <section class="lter box box-info">
        <header class="box-header with-border text-center">
            <h3 class="box-title">
                <i class="fa fa-ticket-o">
                </i> All Your tickets
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
                        <i class="fa fa-link"></i>
                        Add New ticket
                    </a>
                </div>
                <thead>
                    <tr>
                    <th><b class="text-muted"><i class="fa fa-user"></i></b>  User Name </th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Status</th>                
                    <th>Created date</th>
                        <!-- <th>Update date</th> -->
                        <th>Options</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th><b class="text-muted"><i class="fa fa-user"></i></b>  User Name </th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Created date</th>
                        <!-- <th>Update date</th> -->
                        <th>Options</th>
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
                            | <b class="text-success"><i class="fa fa-unlock"></i> Open</b>
                            @else  
                            | <b class="text-danger"><i class="fa fa-lock"></i>  Closed</b>
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
                                            <h4 id="msg-shorten ">Hide Shorten link</h4>
                                        </div>
                                        <p class="text-danger">Are You Sure You Want Hide
                                            <b class="text-success">{{$ticket->slug}}</b> link ?</p> 
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
                <h2 class="text-danger alert alert-warning"> You don't have tickets</h2>
            </center>
            </div>
            <div class="text-clear col-md-12">  </div>
            <div class="col-md-12 text-center">
                <a href="{{route('tickets.create')}}" class="btn btn-success"> 
                    Click to Add New ticket
                </a>
            </div>
            @endif 
        </section>
    </section>
</div>  
@endsection
