@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{ Form::open(array('route' =>  ['file.update',$file->id] ,'method'  => 'POST', 'id'=>'upload_form','files'=>true)) }}
<div style="display: none;">
	{{ method_field('PUT') }}
	{{ csrf_field() }}
</div>
<div class="col-md-12">
  <div class="collapse" id="collapseAdvanced">
    <div class="card card-body">
      <div class="advanced-div" id="advanced-div" style="">
        <!-- display: none; overflow: hidden; -->
        
        <div class="row">
          <div class="col-sm-4">
            <div class="form-group {{$errors->has('password') ? ' has-error' : ''}}">
              {{  Form::label('password', 'Add password')   }}

              {{Form::text('password',$file->password,
              ['class' => "form-control input-sm ",
              'id'=>'password'])  }}

              @if ($errors->has('password'))
              <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group {{$errors->has('folder_id') ? ' has-error' : ''}}">
              {{  Form::label('folder_id', 'Folder Name')   }}

              {{Form::select('folder_id', $folders ,$file->folder_id, ['class' => "form-control input-sm ",'id'=>'folder_id'])  }}
              @if ($errors->has('folder_id'))
              <span class="help-block">
                <strong>{{ $errors->first('folder_id') }}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group {{$errors->has('domain_id') ? ' has-error' : ''}}">             
              <label for="domains">domains</label>

              {{Form::select('domain_id', $domains ,$file->domain_id, ['class' => "form-control input-sm ",'id'=>'folder_id'])  }}
              @if ($errors->has('domain_id'))
              <span class="help-block">
                <strong>{{ $errors->first('domain_id') }}</strong>
              </span>
              @endif
            </div>
          </div>
        
          <div class="col-sm-4">
            <div class="well well-sm {{$errors->has('title') ? ' has-error' : ''}}">
              {{Form::text('title',$file->title, ['class' =>
              "form-control input-sm ",
              'id'=>'title','placeholder'=>'Add Title'])  }}
              @if ($errors->has('title'))
              <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="col-sm-4">
            <div class="well well-sm {{$errors->has('isPrivate') ? ' has-error' : ''}}">
             
             {{ Form::radio('isPrivate','1',FALSE) }} private
             {{ Form::radio('isPrivate','0',TRUE) }} Public

              @if ($errors->has('isPrivate'))
              <span class="help-block">
                <strong>{{ $errors->first('isPrivate') }}</strong>
              </span>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-8">
  <div class="form-group {{$errors->has('path') ? ' has-error' : ''}}">
   @if(!isset($file->path))

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
     <span class="fileinput-filename">{{$file->path}}</span>
     </div>
    <input type="hidden" name="path_name" value="{{$file->path}}"/>
    <span class="input-group-addon btn btn-default btn-file">
    <span class="fileinput-new">Select file</span>
    <span class="fileinput-exists">Change</span>
    <input type="hidden">
    <input type="hidden" value="" name="">
    <input type="file" name="path" value="{{$file->path}}"></span>
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

    <div class="form-group {{$errors->has('description') ? ' has-error' : ''}}">
      <!-- {{  Form::label('description', 'description')   }} -->
      {{ Form::textarea('description',$file->description,
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
<div class="row">
            <div class="col-lg-8">

                <div class="form-group title-block">

                   <input type="text" class="form-control" placeholder="Title" name="title" value="{{ $file->title }}" required>

              </div>

              <textarea placeholder="Description" name="content" required>{{ $file->description }}</textarea>

            </div>

            <div class="col-lg-4">

                <div class="ibox">

                  <div class="ibox-title">
                          <h5>Post Details</h5>
                      </div>
                      <div class="ibox-content">

                          <label class="m-t-xs">SEO Title</label>
                          <input type="text" placeholder="Seo Title" name="seo_title" class="form-control m-b" value="{{ $file->seo_title }}">
                          
                          <label class="m-t-xs">SEO Description</label>
                          <textarea placeholder="Seo Description" name="seo_description" class="form-control">{{ $file->seo_description }}</textarea>                             

                      </div>

                  </div>

                <div class="ibox">

                    <div class="ibox-title">
                        <h5>Path File</h5>
                    </div>
                    <div class="ibox-content">
                        <div style="width:100%;">

                                @if(!isset($file->path))

                                    <div class="fileinput fileinput-new input-group m-b-none" data-provides="fileinput">
                                        <div class="form-control" data-trigger="fileinput"><i class="fa fa-image m-r-xs"></i> <span class="fileinput-filename">No file selected</span></div>
                                        <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span><input type="hidden"><input type="file" name="path" value=""></span>
                                        <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
                                    
                                @else
                                
                                    <div class="fileinput input-group m-b-none fileinput-exists" data-provides="fileinput">
                                        <div class="form-control" data-trigger="fileinput"><i class="fa fa-image m-r-xs"></i> <span class="fileinput-filename"><?=$file->path;?></span></div>
                                        <input type="hidden" name="path_name" value="<?=$file->path;?>"/>
                                        <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span><input type="hidden"><input type="hidden" value="" name=""><input type="file" name="path" value="<?=$file->path;?>"></span>
                                        <a href="#" class="remove-img input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
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