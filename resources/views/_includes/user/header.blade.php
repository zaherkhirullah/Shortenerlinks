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
            @auth
            @if(Auth::user()->role->name=="admin" ||Auth::user()->role->name=="it")
                <li>
                    <a href="{{route('admin.dashboard')}}"> @lang('lang.admin_area')</a>
                </li>
            @endif
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
            <li class="hidden-xs">
            <a href="{{url('/')}}" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bell"></i>
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
            @include('tools.partials.guest')
        </ul>
    </header>