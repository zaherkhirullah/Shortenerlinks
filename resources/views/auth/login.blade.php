@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3>
                        <center> Sign in to dashboard</center>
                    </h3>
                </div>
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="panel-body">


                        <div class="col-md-12">

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
                                <div class="col-md-4 col-md-offset">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <footer class="panel-footer">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary">
                               <i class="ion ion-android-checkmark-circle"></i> Login
                            </button>
                        </div>
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                               <i class="ion ion-android-lock"> </i> Forgot Your Password?
                            </a>
                        </footer>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
