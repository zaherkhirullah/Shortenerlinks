    {{ Form::open(array('route' => ['plans.update',$plan->id] ,'method'  => 'POST', 'id'=>'Edit_form')) }}
    <div style="display: none;">
	{{ method_field('PUT') }}
    @csrf
    </div>
    <div class="col-md-12">
            <div class="col-md-6">
                    <div class="form-group {{$errors->has('name') ? ' has-error' : ''}}">
                    {{  Form::label('name', \Lang::get('lang.Name'))   }}
                
                    {{Form::text('name',$plan->name,
                    ['class' => "form-control input-sm ",
                    'id'=>'name','placeholder'=>\Lang::get('lang.Name')])  }}
                
                    @if ($errors->has('name'))
                    <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                    </div>
                    </div>

            <div class="col-md-6">
                    <div class="form-group {{$errors->has('display_name') ? ' has-error' : ''}}">
                    {{  Form::label('display_name', \Lang::get('lang.title'))   }}
                
                    {{Form::text('display_name',$plan->display_name,
                    ['class' => "form-control input-sm ",
                    'id'=>'display_name','placeholder'=>\Lang::get('lang.title')])  }}
                
                    @if ($errors->has('display_name'))
                    <span class="help-block">
                    <strong>{{ $errors->first('display_name') }}</strong>
                    </span>
                    @endif
                    </div>
                    </div>
                    <div class="col-md-6">
                        {{  Form::label('monthly_price', \Lang::get('lang.monthly_price'))   }}
                         <div class="form-group {{$errors->has('monthly_price') ? ' has-error' : ''}}">
                            {{   Form::text('monthly_price',$plan->monthly_price, ['class' =>"form-control input-sm ",
                            'id'=>'monthly_price','placeholder'=>'0.00']) 
                            }}
                            @if ($errors->has('monthly_price'))
                            <span class="help-block">
                            <strong>{{ $errors->first('monthly_price') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        {{  Form::label('yearly_price', \Lang::get('lang.yearly_price'))   }}
                            <div class="form-group {{$errors->has('yearly_price') ? ' has-error' : ''}}">
                            {{   Form::text('yearly_price',$plan->yearly_price, ['class' =>"form-control input-sm ",
                            'id'=>'yearly_price','placeholder'=>'0.00']) 
                            }}
                            @if ($errors->has('yearly_price'))
                            <span class="help-block">
                            <strong>{{ $errors->first('yearly_price') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                            {{  Form::label('space_size', \Lang::get('lang.space_size').' GB')   }}
                             <div class="form-group {{$errors->has('space_size') ? ' has-error' : ''}}">
                                {{   Form::text('space_size',$plan->space_size, ['class' =>"form-control input-sm ",
                                'id'=>'space_size','placeholder'=>'0.00 GB']) 
                                }}
                                @if ($errors->has('space_size'))
                                <span class="help-block">
                                <strong>{{ $errors->first('space_size') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                {{--  <div class="col-md-12">
                <div class="form-group textarea {{$errors->has('description') ? ' has-error' : ''}} ">
                    <label for="description">Description</label>
                <textarea name="description" class="form-control text-editor" id="description" rows="5" >{{$plan->description}}</textarea>
                    @if ($errors->has('description'))
                    <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                    </span>
                    @endif
                </div>
            </div>  --}}
                    <table class="table table-hover table-striped">
                <tbody>
                @foreach($about_plans as $about)
                <tr>
                    <td>
                        <span style="font-weight: bold;">{{$about->name}}</span>
                        <span class="help-block">{{$about->description}}</span>
                    </td>
                    <td>
                    <span>@lang('lang.no')</span>
                    <label  class="switch" >
                        <input class="script_about "for="about_{{$about->id}}" name="about_{{$about->id}}"  type="checkbox" >
                            <span  class="switch-button-label" > </span> 
                            @lang('lang.yes')
                    </label>              
                </tr>
                @endforeach
                <tr>
                </tbody>
             </table>
    </div>

    <div style="clear:both">
            <br>
            <p>* This feature requires the visitor to the short link to be logged in then this feature will take effect.</p>
    <hr>
    </div>
    <footer class="panel-footer">
    <center>
    {{ Form::submit('update',['class' => 'btn btn-lg btn-success'])   }}
    </center>

    </footer>
    </div>
    {{ Form::close() }}

    <div class="upload edit-file-result"></div>