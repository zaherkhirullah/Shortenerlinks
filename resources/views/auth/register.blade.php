@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3>
                        <center> Registeration Form</center>
                    </h3>
                </div>

                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">

                                <div class="input-group">
                                    <span for="first_name" title="First Name" class="input-group-addon">
                                        <i class="ion ion-happy-outline"></i>
                                    </span>
                                    <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" placeholder="First Name" required autofocus>

                                    @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">

                                <div class="input-group">
                                    <span for="last_name"  title="Last Name" class="input-group-addon">
                                        <i class="ion ion-happy"></i>
                                    </span>
                                    <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name" required autofocus>

                                    @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <div class="input-group">
                                    <span for="username" title="user name" class="input-group-addon">
                                        <i class="ion ion-person"></i>
                                    </span>

                                    <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required>

                                    @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="input-group">
                                    <span for="email" title="E-Mail Address" class="input-group-addon">
                                        <i class="ion ion-ios-email"></i>
                                    </span>

                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-Mail Address" required>

                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="input-group">
                                    <span for="last_name" title="password"   class="input-group-addon"> 
                                        <i class="ion ion-android-lock" ></i>
                                    </span>


                                    <input id="password" type="password" placeholder="Password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span for="password-confirm" title="password-confirm"  class="input-group-addon">
                                        <i class="ion ion-android-unlock" ></i>
                                    </span>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  placeholder="Repeat Password" required>

                                </div>
                            </div>


                        </div>
                    </div>

                    <footer class="panel-footer">
                        <center class="">
                              <a class="btn btn-link" href="{{ route('login') }}">
                            <i class="ion ion-android-checkmark-circle"></i> I have Account already
                            </a>
                            
                            <button type="submit" class="btn btn-success">
                                <i class="ion ion-ios-personadd"></i> Register
                            </button>


                        </center>
                    </footer>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
