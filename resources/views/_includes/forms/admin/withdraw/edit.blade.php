{{ Form::open(array('route' =>  ['tickets.update',$ticket->id] , 'method'  => 'POST','id'=>'upload_form','tickets'=>true)) }}
<div style="display: none;">
	{{ method_field('PUT') }}
	{{ csrf_field() }}
</div>
<div class="col-md-12">
  <div class="collapse" id="collapseAdvanced">
    <div class="card card-body">
    <div class="form-group {{$errors->has('subject') ? ' has-error' : ''}}">
      {{  Form::label('subject', 'subject')   }}
      {{ Form::text('subject',$ticket->subject,
      ['id'=>'subject','placeholder'=>'ticket subject','class' => "form-control ",'required' => 'required',])  
      }}
      @if ($errors->has('subject'))
      <span class="help-block">
        <strong>{{ $errors->first('subject') }}</strong>
      </span>
      @endif
    </div>
    <div class="form-group {{$errors->has('message') ? ' has-error' : ''}}">
      {{  Form::label('message', 'message')   }}
      {{ Form::textarea('message',$ticket->message,
      ['id'=>'path','placeholder'=>'Insert define to your ticket','class' => "form-control ",'required' => 'required',])  
      }}
      @if ($errors->has('message'))
      <span class="help-block">
        <strong>{{ $errors->first('message') }}</strong>
      </span>
      @endif
    </div>
    

  <div class="col-md-8">
  <div class="form-group {{$errors->has('path') ? ' has-error' : ''}}">
   @if(!isset($ticket->path))

<div class="ticketinput ticketinput-new input-group m-b-none" data-provides="ticketinput">
    <div class="form-control" data-trigger="ticketinput">
    <i class="fa fa-image m-r-xs"></i> 
    <span class="ticketinput-ticketname">No ticket selected</span>
    </div>
    <span class="input-group-addon btn btn-default btn-ticket">
    <span class="ticketinput-new">Select ticket</span>
    <span class="ticketinput-exists">Change</span>
    <input type="hidden">
    <input type="ticket" name="path" value=""></span>
    <a href="#" class="input-group-addon btn btn-default ticketinput-exists" data-dismiss="ticketinput">
       Remove
    </a>
</div>

@else

<div class="ticketinput input-group m-b-none ticketinput-exists" data-provides="ticketinput">
    <div class="form-control" data-trigger="ticketinput">
    <i class="fa fa-image m-r-xs"></i>
     <span class="ticketinput-ticketname">{{$ticket->path}}</span>
     </div>
    <input type="hidden" name="path_name" value="{{$ticket->path}}"/>
    <span class="input-group-addon btn btn-default btn-ticket">
    <span class="ticketinput-new">Select ticket</span>
    <span class="ticketinput-exists">Change</span>
    <input type="hidden">
    <input type="hidden" value="" name="">
    <input type="ticket" name="path" value="{{$ticket->path}}"></span>
    <a href="#" class="remove-img input-group-addon btn btn-default ticketinput-exists" 
    data-dismiss="ticketinput">Remove
    </a>
   
</div>                                      

@endif
@if ($errors->has('path'))
      <span class="help-block">
        <strong>{{ $errors->first('path') }}</strong>
      </span>
      @endif
    </div>

    <div class="form-group {{$errors->has('description') ? ' has-error' : ''}}">
      <!-- {{  Form::label('description', 'description')   }} -->
      {{ Form::textarea('description',$ticket->description,
      ['id'=>'path','placeholder'=>'Insert define to your ticket','class' => "form-control ",'required' => 'required',])  
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

<div class="upload add-ticket-result"></div>
<div class="row">
            <div class="col-lg-8">

                <div class="form-group title-block">

                   <input type="text" class="form-control" placeholder="Title" name="title" value="{{ $ticket->title }}" required>

              </div>

              <textarea placeholder="Description" name="content" required>{{ $ticket->description }}</textarea>

            </div>

            <div class="col-lg-4">

                <div class="ibox">

                  <div class="ibox-title">
                          <h5>Post Details</h5>
                      </div>
                      <div class="ibox-content">

                          <label class="m-t-xs">SEO Title</label>
                          <input type="text" placeholder="Seo Title" name="seo_title" class="form-control m-b" value="{{ $ticket->seo_title }}">
                          
                          <label class="m-t-xs">SEO Description</label>
                          <textarea placeholder="Seo Description" name="seo_description" class="form-control">{{ $ticket->seo_description }}</textarea>                             

                      </div>

                  </div>

                <div class="ibox">

                    <div class="ibox-title">
                        <h5>Path ticket</h5>
                    </div>
                    <div class="ibox-content">
                        <div style="width:100%;">

                                @if(!isset($ticket->path))

                                    <div class="ticketinput ticketinput-new input-group m-b-none" data-provides="ticketinput">
                                        <div class="form-control" data-trigger="ticketinput"><i class="fa fa-image m-r-xs"></i> <span class="ticketinput-ticketname">No ticket selected</span></div>
                                        <span class="input-group-addon btn btn-default btn-ticket"><span class="ticketinput-new">Select ticket</span><span class="ticketinput-exists">Change</span><input type="hidden"><input type="ticket" name="path" value=""></span>
                                        <a href="#" class="input-group-addon btn btn-default ticketinput-exists" data-dismiss="ticketinput">Remove</a>
                                    </div>
                                    
                                @else
                                
                                    <div class="ticketinput input-group m-b-none ticketinput-exists" data-provides="ticketinput">
                                        <div class="form-control" data-trigger="ticketinput"><i class="fa fa-image m-r-xs"></i> <span class="ticketinput-ticketname"><?=$ticket->path;?></span></div>
                                        <input type="hidden" name="path_name" value="<?=$ticket->path;?>"/>
                                        <span class="input-group-addon btn btn-default btn-ticket"><span class="ticketinput-new">Select ticket</span><span class="ticketinput-exists">Change</span><input type="hidden"><input type="hidden" value="" name=""><input type="ticket" name="path" value="<?=$ticket->path;?>"></span>
                                        <a href="#" class="remove-img input-group-addon btn btn-default ticketinput-exists" data-dismiss="ticketinput">Remove</a>
                                    </div>                                      
                            
                                @endif

                        </div>

                        <button class="btn btn-primary" style="margin-top: 20px; margin-bottom: 20px;" name="publish">Update</button>

                    </div>

                </div>
                
                @if($errors->any())
                   <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                   </div>
                @endif                      

            </div>
        </div>

    </div>
</form>