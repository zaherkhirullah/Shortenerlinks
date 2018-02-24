<header class="bg-primary lt header navbar navbar-fixed-top-xs">
    <div class="navbar-header bg-primary aside-md">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
            <i class="fa fa-bars">
            </i>
        </a>
        <a href="/" class="navbar-brand" data-toggle="fullscreen">
            <!-- <img src="{{ asset('styles/member/logo.png') }}" class="m-r-xs"> -->
            <i class="ion ion-ios-rose-outline" ></i>
            Shorter Links
<i class="ion ion-ios-rose-outline" ></i>
       </a>
            <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user">
                <i class="fa fa-cog">
                </i>
            </a>
        </div>

        <ul class="nav navbar-nav navbar-right nav-user m-n hidden-xs">
            @if(Auth::user()->role->name=="admin" ||Auth::user()->role->name=="it")
            <li>
                <a href="{{route('admin.dashboard')}}"> @lang('lang.admin_area')</a>
            </li>
            @endif
            @auth
            <li>
                 <a href="{{route('user.dashboard')}}"> @lang('lang.user_area') </a>
            </li>
            @endauth
            <li class="dropdown nav-item">
                            <a href="#" class="dropdown-toggle" type="button" data-toggle="dropdown">  
                                <i class="fa fa-language" aria-hidden="true"></i> 
                                <span class="caret"></span>
                            </a> 

                            <ul class="dropdown-menu">
                                <li><a href="{{route('lang','en')}}" id="en">English</a></li>
                                <li><a href="{{route('lang','ar')}}" id="ar">العربية</a></li>
                            </ul>

                        </li>
                 <!--         <li >
                            <select id="changelang">
                                <option value="en"  $cuRRlocal =='en'?'selected':'' }}>english</option>
                                <option  value="ar"  $cuRRlocale =='ar'?'selected':'' }}>العربية</option>
                            </select>
                        </li> -->
            <li class="hidden-xs">
                <a href="/home" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bell">
                    </i>
                </a>
                <div class="dropdown-menu aside-xl">
                    <section class="panel bg-white">
                        <header class="panel-heading b-light bg-light">
                            <strong> 
                                <span class="count">
                                        @lang('lang.no_notification')
                                </span> 
                            </strong>
                        </header>
                    </section>
                </div>
            </li>

            @guest
            <li>
                <a href="{{ route('login') }}">@lang('lang.login')</a>
            </li>
            <li>
                <a href="{{ route('register') }}">@lang('lang.register')</a>
            </li>
            @else

            <li class="dropdown">
            <a href="{{route('account.profile')}}" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="thumb-sm avatar pull-left">
                        @if(Auth::user()->avatar==null)
                        <img src="{{ asset('styles/member/images/avatar.jpg') }}">
                        @else
                        <img src="{{ asset('user/image/Auth::user()->avatar') }}">
                        @endif
                    </span>
                    {{ Auth::user()->username }}<b class="caret">
                    </b>
                </a>
                <ul class="dropdown-menu animated fadeInRight">
                    <span class="arrow top">
                    </span>
                    <li>
                        <a href="{{route('account.profile')}}">@lang('lang.profile')</a>
                    </li>
                        <!-- <li class="divider">
                        </li> -->
                        <li class="active ">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                          <i class="fa fa-sign-out text-danger"></i>      @lang('lang.logout')
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>

            @endguest

        </ul>

    </header>