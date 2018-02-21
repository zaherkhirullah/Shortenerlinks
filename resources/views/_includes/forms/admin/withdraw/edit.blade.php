{{ Form::open(array('route' =>  ['withdraws.update',$withdraw->id] , 'method'  => 'POST','id'=>'upload_form','withdraws'=>true)) }}
<div style="display: none;">
	{{ method_field('PUT') }}
	{{ csrf_field() }}
</div>
<div class="col-md-12">
  <div class="collapse" id="collapseAdvanced">
    <div class="card card-body">
    <div class="form-group {{$errors->has('subject') ? ' has-error' : ''}}">
      {{  Form::label('subject', 'subject')   }}
      {{ Form::text('subject',$withdraw->subject,
      ['id'=>'subject','placeholder'=>'withdraw subject','class' => "form-control ",'required' => 'required',])  
      }}
      @if ($errors->has('subject'))
      <span class="help-block">
        <strong>{{ $errors->first('subject') }}</strong>
      </span>
      @endif
    </div>
    <div class="form-group {{$errors->has('message') ? ' has-error' : ''}}">
      {{  Form::label('message', 'message')   }}
      {{ Form::textarea('message',$withdraw->message,
      ['id'=>'path','placeholder'=>'Insert define to your withdraw','class' => "form-control ",'required' => 'required',])  
      }}
      @if ($errors->has('message'))
      <span class="help-block">
        <strong>{{ $errors->first('message') }}</strong>
      </span>
      @endif
    </div>
    

  <div class="col-md-8">
  <div class="form-group {{$errors->has('path') ? ' has-error' : ''}}">
   @if(!isset($withdraw->path))

<div class="withdrawinput withdrawinput-new input-group m-b-none" data-provides="withdrawinput">
    <div class="form-control" data-trigger="withdrawinput">
    <i class="fa fa-image m-r-xs"></i> 
    <span class="withdrawinput-withdrawname">No withdraw selected</span>
    </div>
    <span class="input-group-addon btn btn-default btn-withdraw">
    <span class="withdrawinput-new">Select withdraw</span>
    <span class="withdrawinput-exists">Change</span>
    <input type="hidden">
    <input type="withdraw" name="path" value=""></span>
    <a href="#" class="input-group-addon btn btn-default withdrawinput-exists" data-dismiss="withdrawinput">
       Remove
    </a>
</div>

@else

<div class="withdrawinput input-group m-b-none withdrawinput-exists" data-provides="withdrawinput">
    <div class="form-control" data-trigger="withdrawinput">
    <i class="fa fa-image m-r-xs"></i>
     <span class="withdrawinput-withdrawname">{{$withdraw->path}}</span>
     </div>
    <input type="hidden" name="path_name" value="{{$withdraw->path}}"/>
    <span class="input-group-addon btn btn-default btn-withdraw">
    <span class="withdrawinput-new">Select withdraw</span>
    <span class="withdrawinput-exists">Change</span>
    <input type="hidden">
    <input type="hidden" value="" name="">
    <input type="withdraw" name="path" value="{{$withdraw->path}}"></span>
    <a href="#" class="remove-img input-group-addon btn btn-default withdrawinput-exists" 
    data-dismiss="withdrawinput">Remove
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
      {{ Form::textarea('description',$withdraw->description,
      ['id'=>'path','placeholder'=>'Insert define to your withdraw','class' => "form-control ",'required' => 'required',])  
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

<div class="upload add-withdraw-result"></div>
<div class="row">
            <div class="col-lg-8">

                <div class="form-group title-block">

                   <input type="text" class="form-control" placeholder="Title" name="title" value="{{ $withdraw->title }}" required>

              </div>

              <textarea placeholder="Description" name="content" required>{{ $withdraw->description }}</textarea>

            </div>

            <div class="col-lg-4">

                <div class="ibox">

                  <div class="ibox-title">
                          <h5>Post Details</h5>
                      </div>
                      <div class="ibox-content">

                          <label class="m-t-xs">SEO Title</label>
                          <input type="text" placeholder="Seo Title" name="seo_title" class="form-control m-b" value="{{ $withdraw->seo_title }}">
                          
                          <label class="m-t-xs">SEO Description</label>
                          <textarea placeholder="Seo Description" name="seo_description" class="form-control">{{ $withdraw->seo_description }}</textarea>                             

                      </div>

                  </div>

                <div class="ibox">

                    <div class="ibox-title">
                        <h5>Path withdraw</h5>
                    </div>
                    <div class="ibox-content">
                        <div style="width:100%;">

                                @if(!isset($withdraw->path))

                                    <div class="withdrawinput withdrawinput-new input-group m-b-none" data-provides="withdrawinput">
                                        <div class="form-control" data-trigger="withdrawinput"><i class="fa fa-image m-r-xs"></i> <span class="withdrawinput-withdrawname">No withdraw selected</span></div>
                                        <span class="input-group-addon btn btn-default btn-withdraw"><span class="withdrawinput-new">Select withdraw</span><span class="withdrawinput-exists">Change</span><input type="hidden"><input type="withdraw" name="path" value=""></span>
                                        <a href="#" class="input-group-addon btn btn-default withdrawinput-exists" data-dismiss="withdrawinput">Remove</a>
                                    </div>
                                    
                                @else
                                
                                    <div class="withdrawinput input-group m-b-none withdrawinput-exists" data-provides="withdrawinput">
                                        <div class="form-control" data-trigger="withdrawinput"><i class="fa fa-image m-r-xs"></i> <span class="withdrawinput-withdrawname"><?=$withdraw->path;?></span></div>
                                        <input type="hidden" name="path_name" value="<?=$withdraw->path;?>"/>
                                        <span class="input-group-addon btn btn-default btn-withdraw"><span class="withdrawinput-new">Select withdraw</span><span class="withdrawinput-exists">Change</span><input type="hidden"><input type="hidden" value="" name=""><input type="withdraw" name="path" value="<?=$withdraw->path;?>"></span>
                                        <a href="#" class="remove-img input-group-addon btn btn-default withdrawinput-exists" data-dismiss="withdrawinput">Remove</a>
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