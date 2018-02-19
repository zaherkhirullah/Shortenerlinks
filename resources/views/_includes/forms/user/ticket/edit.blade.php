@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{ Form::open(array('route' =>  ['ticket.update',$ticket->id] ,'method'  => 'POST', 'id'=>'upload_form','files'=>true)) }}
<div style="display: none;">
	{{ method_field('PUT') }}
	{{ csrf_field() }}
</div>
<div class="col-md-12">
  
  <div class="col-md-8">
          <div class="form-group {{$errors->has('subject') ? 'has-error':'' }}">
          
            {{ Form::text('subject',$ticket->subject,
            ['placeholder' =>'Insert Subject',
            'required'=>'required','id'=>'subject',
            'class' =>"form-control "
            ])  
            }}
             @if ($errors->has('subject'))
            <span class="help-block">
              <strong>{{ $errors->first('subject') }}</strong>
            </span>
            @endif
           </div>
         
  <div class="form-group {{$errors->has('path') ? ' has-error' : ''}}">
   @if(!isset($ticket->path))

<div class="fileinput fileinput-new input-group m-b-none" data-provides="fileinput">
    <div class="form-control" data-trigger="fileinput">
    <i class="fa fa-image m-r-xs"></i> 
    <span class="fileinput-filename">No file selected</span>
    </div>
    <span class="input-group-addon btn btn-default btn-file">
    <span class="fileinput-new">Select file</span>
    <span class="fileinput-exists">Change</span>
    <input type="hidden">
    <input type="file" name="path" value=""></span>
    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">
       Remove
    </a>
</div>

@else

<div class="fileinput input-group m-b-none fileinput-exists" data-provides="fileinput">
    <div class="form-control" data-trigger="fileinput">
    <i class="fa fa-image m-r-xs"></i>
     <span class="fileinput-filename">{{$ticket->path}}</span>
     </div>
    <input type="hidden" name="path_name" value="{{$ticket->path}}"/>
    <span class="input-group-addon btn btn-default btn-file">
    <span class="fileinput-new">Select file</span>
    <span class="fileinput-exists">Change</span>
    <input type="hidden">
    <input type="hidden" value="" name="">
    <input type="file" name="path" value="{{$ticket->path}}"></span>
    <a href="#" class="remove-img input-group-addon btn btn-default fileinput-exists" 
    data-dismiss="fileinput">Remove
    </a>
   
</div>                                      

@endif
@if ($errors->has('path'))
      <span class="help-block">
        <strong>{{ $errors->first('path') }}</strong>
      </span>
      @endif
    </div>

    <div class="form-group {{$errors->has('message') ? ' has-error' : ''}}">
      <!-- {{  Form::label('message', 'message')   }} -->
      {{ Form::textarea('message',$ticket->message,
      ['id'=>'path','placeholder'=>'Insert define to your file','class' => "form-control ",'required' => 'required',])  
      }}
     
    </div>

  </div>
  <div class="col-md-2 col-md-offset-2">
    <button type="button" data-toggle="collapse" data-target="#collapseAdvanced" aria-expanded="false" aria-controls="collapseAdvanced" class="btn btn-default btn-md advanced ">
      Advanced <i class="fa fa-plus"></i>
    </button>
  </div>

  <div style="clear:both">
    <hr><br>
  </div>
  <footer class="panel-footer">
    <center>
      {{ Form::submit('Update',['class' => 'btn btn-lg btn-success'])   }}
    </center>

  </footer>
</div>
{{ Form::close() }}

<div class="upload add-file-result"></div>
