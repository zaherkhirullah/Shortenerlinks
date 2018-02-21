@extends('layouts.adlayout')
@section('title','{{$user->username}}  Details')

@section('content')
<h3> {{$user->username}}  Details</h3>
<div class="col-md-12">
    <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading text-center"> User Balance</div>
                <div class="panel-body  text-center">
                        {{$user->Balance->avilable_amount}} $
                </div> 
            </div>   
    </div>
    <div class="col-md-4">
        <div class="panel panel-warning">
            <div class="panel-heading text-center"> User Balance</div>
            <div class="panel-body  text-center">
                    {{$user->Balance->avilable_amount}} $
            </div>  
        </div> 
    </div>
    <div class="col-md-4">
    <div class="panel panel-danger">
            <div class="panel-heading text-center"> User Balance</div>
            <div class="panel-body  text-center">
                    {{$user->Balance->avilable_amount}} $
            </div>  
        </div> 
    </div>
    
</div>
<div class="col-md-12">

<div class="col-md-6">
<h4 class="alert alert-success text-center">Links (({{count($links)}}))</h4>
<table id="DataTable_1" class="mdl-data-table table-bordered table-hover" cellspacing="0" width="100%">
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
         <td>{{$link->shorted_url}} </td>
         <td>{{$link->clicks}} </td>
         <td>{{$link->earnings}} </td>
         <td>{{$link->earnings}} </td>
        </tr>
        @endforeach
        
        </tbody>
    </table>

        
</div>
<div class="col-md-6">
    <h4 class="alert alert-info text-center">Files (({{count($files)}}))</h4>
    <table id="DataTable" class="mdl-data-table table-bordered table-hover" cellspacing="0" width="100%">
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
         <td>{{$file->shorted_url}} </td>
         <td>{{$file->views}} </td>
         <td>{{$file->downloads}} </td>
         <td>{{$file->earnings}} </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection