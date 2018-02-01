@extends('layouts.layout')

@section('content')

<section class="scrollable padder">
    <section class="content">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <i class="fa fa-link">
                        </i> Add New Link
                    </h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="display: block;">

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        Launch demo modal
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Modal -->

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Open modal for @fat</button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Open modal for @getbootstrap</button>

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Recipient:</label>
                                            <input type="text" class="form-control" id="recipient-name">
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Message:</label>
                                            <textarea class="form-control" id="message-text"></textarea>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Send message</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="box-short" id="shorterNew" >
                        <div class="box box-success box-solid shorten-member">
                            <div class="box-body">

                                <form method="post" accept-charset="utf-8" id="shorten" action="/user/links/create">


                                    <div class="input-group">
                                        <input type="text" name="url" placeholder="Insert Your URL Here" required="required"  class="form-control" id="url">
                                    </div>


                                    <div class="advanced-div" id="advanced-div" style="">
                                        <!-- display: none; overflow: hidden; -->

                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="alias">Alias</label>
                                                    <input type="text" name="alias" placeholder="Alias" class="form-control input-sm" id="alias">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="ad-type">Advertising Type</label>

                                                    {{Form::select('ad_id', $ads ,$selectedAds, ['class' => 'form-control input-sm' ,'id'=>'ad_id'])  }}

                                                    <select name="ad_type" class="form-control input-sm" >
                                                        <option value="1">Interstitial</option>
                                                        <option value="2" selected="selected">Banner</option>
                                                        <option value="0">No Advert</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">             
                                                    <label for="domains">domains</label>

                                                    {{Form::select('domain_id', $domains ,$selectedDomain, ['class' => 'form-control input-sm','id'=>'domain_id'])  }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-md btn-primary pull-right" type="submit"> 
                                        Shorten
                                    </button>


                                    <button type="button" class="btn btn-default btn-xs advanced">
                                        Advanced Options
                                    </button>

                                    <div style="display:none;">
                                        <input type="hidden" name="_Token[fields]" value="e0ec8ae2b120ec3085f501e05919c7e25ef78c2a%3A">
                                        <input type="hidden" name="_Token[unlocked]" value="adcopy_challenge%7Cadcopy_response%7Cg-recaptcha-response">
                                    </div>
                                </form>
                                <div class="shorten add-link-result"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
<script type="text/javascript">

    $(document).ready(){

    }
</script>
@endsection