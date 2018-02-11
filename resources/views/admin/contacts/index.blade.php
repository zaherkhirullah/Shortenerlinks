@extends('layouts.adlayout')

@section('content')

<div class="col-md-12">
    <section class="lter box box-success">
        <header class="box-header with-border text-center">
            <h3 class="box-title">
                <i class="fa fa-link">
                </i> All Your contacts
            </h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                </button>
            </div>
        </header>
        <!-- /.box-header -->
        <section class="box-body">   
            @if(count($contacts))
            <table id="DataTable" class="mdl-data-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Created date</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Created date</th>
                        <th>Options</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($contacts as $contact)
                    <tr>
                        <td>{{$contact->name }}</td>
                        <td>{{$contact->email }}</td>
                        <td>{{$contact->subject }}</td>
                        <td>{{$contact->Message }}</td>
                        <td>{{$contact->created_at }}</td>
                        <td>
                            <a href="{{route('contacts.edit',$contact->id)}}" data-toggle="modal"class="text-success" >
                                <span class="text">
                                    <i class="fa fa-2x fa-edit"></i> 
                                </span>
                            </a>
                            <a href="#delete-link-{{$contact->id}}" data-toggle="modal" class=" text-danger" >
                                <span class="text">
                                    <i class="fa fa-2x fa-eye-slash"></i> 
                                </span>
                            </a>
                        </td>
                    </tr>
                    <div class="modal fade" id="delete-link-{{$contact->id}}">
                        <div class="modal-dialog modal-shorten">
                            <div class="modal-content bg-default">
                                <div class="modal-body">
                                    <div class="padder">
                                        {!! Form::open(array('route' =>['contacts.destroy',$contact->id],
                                        'method'=>'delete','class'=>'form-delete','id'=>'form-delete' )) !!}
                                        {{ csrf_field() }}
                                     {{ method_field('DELETE') }}
                                        <div class="text-center">
                                            <h4 id="msg-shorten ">Hide Contatcs</h4>
                                        </div>
                                        <p class="text-danger">Are You Sure You Want Hide
                                            <b class="text-success">{{$contact->slug}}</b> link ?</p> 
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
                    <h2 class="text-danger alert alert-warning"> You don't have contacts</h2>
                    </center>
                </div>
                <div class="text-clear col-md-12">  </div>
                <!-- <div class="col-md-12 text-center">
                    <a href="{{route('contacts.create')}}" class="btn btn-success"> 
                       <i class="fa fa-plus"></i> Click to Add New contacts
                    </a>
                </div> -->
            @endif 
            
</section>
</section>
</div>  

@endsection
