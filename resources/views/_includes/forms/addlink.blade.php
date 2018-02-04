{!! Form::open(array('url' => '/user/links/shorten',
                     'id' => 'shorten'));
!!}

<div class="form-group">
       {{  Form::label('url','')  }}
       {{ Form::text(array('placeholder' =>'Url Here',
                           'required'=>'required',
                           'id'=>'url',
                           'class' => 'form-control'
                           ))
       }}
</div>

<div class="advanced-div" style="display: none; overflow: hidden;">

    <div class="row">

       @if($custom_alias)
            <div class="col-sm-4">
                <div class="form-group">
                   {{  Form::label('alias','Alias')  }}
                  {{ Form::text(array('placeholder' =>'Alias',
                       'id'=>'alias',
                       'class' => 'form-control input-sm'
                       ))
                  }}

                </div>
            </div>
        @endif

        <div class="col-sm-4">
            <div class="form-group">

                @if (count($ads) > 1)
                {{  Form::select('ad_id', $ads ,$selectedAds,
                                ['class' => 'form-control input-sm' ,
                                 'id'=>'ad_id'
                                ]) 
                }}

                @else
                    {{ Form::hidden('ad_id', $ads ,1,['id'=>'ad_id'] )  }}
                 @endif
            </div>
        </div>
        <div class="col-sm-4">
            @if (count($domains))
                <div class="form-group">
                   {{ Form::label('domain', 'Domain') }}

                @if (count($domains) > 1)
                     {{Form::select('domain_id', $domains ,$selectedDomain, ['class' => 'form-control input-sm','id'=>'domain_id'])  }}

                @else
                    {{ Form::hidden('domain_id', $domains ,1,['id'=>'domain_id'] )  }}
                 @endif
                </div>
            @endif
        </div>
    </div>
</div>

    {{ Form::submit('Shorten',['class' => 'btn btn-submit btn-primary btn-xs'])  }}
<button type="button" class="btn btn-default btn-xs advanced">
    Advanced Options 
    </button>
    
{!! Form::close() !!}
<div class="shorten add-link-result"></div>
