            @extends('layouts.adlayout')
            @section('title'," {{$user->username}} @lang('lang.Details')")

            @section('content')
            <h3> {{$user->username}}  @lang('lang.Details') </h3>
            <div class="col-md-12">
            <div class="col-md-3">
            <div class="panel panel-default">
            <div class="panel-heading text-center"> User Balance</div>
            <div class="panel-body  text-center">
            {{$user->Balance->avilable_amount}} $
            </div> 
            </div>   
            </div>
            <div class="col-md-3">
            <div class="panel panel-info">
            <div class="panel-heading text-center"> User Files</div>
            <div class="panel-body  text-center">
            {{$user->files->count()}} 
            </div>  
            </div> 
            </div>
            <div class="col-md-3">
            <div class="panel panel-success">
            <div class="panel-heading text-center"> User Links</div>
            <div class="panel-body  text-center">
            {{$user->links->count()}} 
            </div>  
            </div> 
            </div>
            <div class="col-md-3">
            <div class="panel panel-info">
            <div class="panel-heading text-center"> User withdraws</div>
            <div class="panel-body  text-center">
            {{$user->withdraws->count()}} 
            </div>  
            </div> 
            </div>

            </div>
            <div class="col-md-12">

            <div class="col-md-6">
            <div class="panel panel-warning">
            <div class="panel-heading">
            <h4 class=" text-center"> «{{count($links)}}» Links</h4>
            </div>
            <table  class="DataTable mdl-data-table table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
            <tr>
            <th>Link</th>
            <th>views</th>
            <th>Earnings</th>
            <th>Earnings</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
            <th>Link</th>
            <th>views</th>
            <th>Earnings</th>
            <th>Earnings</th>
            </tr>
            </tfoot>
            <tbody>
            @foreach($links as $link)
            <tr>
            <td><a href="{{route('links.show',$link->id)}}"> {{$link->slug}}</a> </td>
            <td>{{$link->clicks}} </td>
            <td>{{$link->earnings}} </td>
            <td>{{$link->earnings}} </td>
            </tr>
            @endforeach

            </tbody>
            </table>


            </div>
            </div>
            <div class="col-md-6">

                    <div class="panel panel-info">
                    <div class="panel-heading">
                    <h4 class="text-center">«{{count($files)}}» Files </h4>
                    </div>
                    <table class="DataTable mdl-data-table table-bordered table-hover" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                    <th>Link</th>
                    <th>views</th>
                    <th>Downloads</th>
                    <th>Earnings</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                    <th>Link</th>
                    <th>views</th>
                    <th>Downloads</th>
                    <th>Earnings</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($files as $file)
                    <tr>
                    <td><a href="{{route('files.show',$file->id)}}">{{$file->slug}}</a> </td>
                    <td>{{$file->views}} </td>
                    <td>{{$file->downloads}} </td>
                    <td>{{$file->earnings}} </td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                    </div>
                    </div>
                    </div>

                    <div class="col-md-6">

                            <div class="panel panel-warning">
                            <div class="panel-heading">
                            <h4 class="text-center">«{{count($withdraws)}}» Withdraws </h4>
                            </div>
                            <table id="DataTable" class="mdl-data-table table-bordered table-hover" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Amount</th>
                                <th>Method</th>
                                <th>Status</th>                            
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Amount</th>
                                <th>Method</th>
                                <th>Status</th>                            
                                <th>Date</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($withdraws as $withdraw)
                            <tr>
                                    <td>{{$withdraw->paymethod->name}} 
                                            <dt class="text-info">{{$withdraw->withdraw_address}} </dt>
                                         </td>
                                    <td>{{$withdraw->amount }} $</td>
                                    <td>
                                    <b class="text-success">
                                            @if($withdraw->status ==1)
                                            <b class="text-warning"><i class="fa fa-spinner"></i> Pending</b>
                                            @elseif($withdraw->status ==2)
                                            <b class="text-info"><i class="fa fa-check"></i> Accepted </b>
                                            @elseif($withdraw->status ==3)
                                                <b class="text-success"><i class="fa fa-lock"></i> Paid</b>
                                            @elseif($withdraw->status ==4)
                                                <b class="text-danger"><i class="fa fa-times"></i> cancled</b>
                                            @endif
                                    </td>
                                    <td>{{$withdraw->created_at }}</td>
                
                            </tr>
                            @endforeach
                            </tbody>
                            </table>
                            </div>
                            </div>
                            </div>
            @endsection