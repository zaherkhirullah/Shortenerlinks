@if (Route::has('login'))
    @auth
        @if(Route::is('homepage'))
        <li class="nav-item nav-item-cta last">
            <a class="btn btn-cta btn-cta-secondary" href="{{ url('user/dashboard') }}"> @lang('lang.my_account')
            </a>
        </li>
        @else
        <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                    <span class="thumb-sm avatar pull-left">
                            @if(Auth::user()->avatar==null)
                            <img src="{{ asset('styles/member/images/avatar.jpg') }}">
                            @else
                            <img src="{{ asset('user/image/Auth::user()->avatar') }}">
                            @endif
                        </span>
                    {{ Auth::user()->username }} <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <span class="arrow top"></span>
                    <li>
                        <a href="{{route('account.profile')}}">
                                <i class="fa fa-user"> </i>
                                @lang('lang.profile')
                        </a>
                    </li>
                    <li>
                        <a href="{{route('account.changePassword')}}">
                                <i class="fa fa-lock"> </i>
                                @lang('lang.change') @lang('lang.password')
                        </a>
                    </li>
                    <li  class="text-center">
                       <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        <b  class="text-danger"> 
                                <i class="fa fa-sign-out"> </i> 
                          @lang('lang.logout')
                        </b>
                        </a>
                      
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        
                    </li>
                </ul>
            </li>
        @endif
@else
        <li class="nav-item">
            <a href="{{ route('login') }}"> 
            <i class="ion ion-log-in" aria-hidden="true"></i> 
            @lang('lang.login')
            </a>
        </li>
        <li class="nav-item nav-item-cta last">
            <a class="btn btn-cta btn-cta-secondary" href="{{ route('register') }}">
            <i class="ion ion-person-add" aria-hidden="true"></i> 
            @lang('lang.sign_up_free')
            </a>
        </li>
    @endauth
@endif