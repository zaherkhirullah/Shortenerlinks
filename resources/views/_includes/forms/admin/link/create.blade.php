{{ Form::open(array ('route' => 'links.store',
  'method'  => 'POST', 'id'=>'shorten_form' ,'files'  => true)) }}
<div class="col-md-12">
<div class="collapse" id="collapseAdvanced">
 <div class="card card-body">
   <div class="advanced-div" id="advanced-div" style="">
     <!-- display: none; overflow: hidden; -->

     <div class="row">
       <div class="col-sm-3">
         <div class="form-group {{$errors->has('alias') ? 'has-error':''}}"> 
           {{  Form::label('alias','Add alias')   }}
           {{ Form::text('alias', '',
           ['placeholder' =>'Alias','id'=>'alias',
           'class' => "form-control input-sm ",])  
           }}
           @if ($errors->has('alias'))
           <span class="help-block">
             <strong>{{ $errors->first('alias') }}</strong>
           </span>
           @endif
         </div>
       </div>
       <div class="col-sm-3">
         <div class="form-group {{$errors->has('folder_id') ? 'has-error':''}}">
           {{  Form::label('folder_id', 'Folder Name')   }}

           {{Form::select('folder_id', $folders ,1, ['class' => "form-control input-sm  "
           ,'id'=>'folder_id'])  }}
           @if ($errors->has('folder_id'))
           <span class="help-block">
             <strong>{{ $errors->first('folder_id') }}</strong>
           </span>
           @endif
         </div>
       </div>
       <div class="col-sm-3">
         <div class="form-group {{$errors->has('domain_id') ? 'has-error':''}}">             
           <label for="domains">domains</label>

           {{Form::select('domain_id', $domains ,1, ['class' => "form-control input-sm ",'id'=>'domain_id'])  }}
           @if ($errors->has('domain_id'))
           <span class="help-block">
             <strong>{{ $errors->first('domain_id') }}</strong>
           </span>
           @endif
         </div>
       </div>
       <div class="col-sm-3">
         <div class="form-group {{$errors->has('ad_id') ? 'has-error':''}}">
           <label for="ad_id">Advertising Type</label>

           {{Form::select('ad_id', $ads ,1, 
           ['class' =>"form-control input-sm ",'id'=>'ad_id'])  }}
           @if ($errors->has('ad_id'))
           <span class="help-block">
             <strong>{{ $errors->first('ad_id') }}</strong>
           </span>
           @endif
         </div>
       </div>
     </div>
   </div>
 </div>
</div>

<div class="col-md-10">
 <div class="form-group {{$errors->has('url') ? 'has-error':'' }}">
 <div class="col-md-8">
   {{ Form::text('url','',
   ['placeholder' =>'Insert Your URL Here',
   'required'=>'required','id'=>'url',
   'class' =>"form-control "
   ])  
   }}
    @if ($errors->has('url'))
   <span class="help-block">
     <strong>{{ $errors->first('url') }}</strong>
   </span>
   @endif
  </div>
   <span class="col-md-2">
     {{ Form::submit('shorten',['class' => 'btn btn-md btn-info '])   }}
   </span>
 </div>
</div>
<div class="col-md-2" >
 <button type="button" data-toggle="collapse" data-target="#collapseAdvanced" aria-expanded="false" aria-controls="collapseAdvanced" class="btn btn-default btn-md advanced ">
   Advanced <i class="fa fa-plus"></i>
 </button>
</div>

</div>
{{ Form::close() }}
<div class="shorten add-link-result"></div>
