<header class="bg-primary lt header navbar navbar-fixed-top-xs">
    <div class="navbar-header bg-primary aside-md">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
            <i class="fa fa-bars">
            </i>
        </a>
        <a href="/" class="navbar-brand" data-toggle="fullscreen">
            <!-- <img src="{{ asset('styles/member/logo.png') }}" class="m-r-xs"> -->
        shortener links</a>
            <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user">
                <i class="fa fa-cog">
                </i>
            </a>
        </div>

        <ul class="nav navbar-nav navbar-right nav-user m-n hidden-xs">

            <li>
                <a href="/admin/dashboard"> Admin</a>
            </li>

            <li class="hidden-xs">
                <a href="/manage/home" class="dropdown-toggle dk" data-toggle="dropdown">
                    <i class="fa fa-bell">
                    </i>
                </a>
                <div class="dropdown-menu aside-xl">
                    <section class="panel bg-white">
                        <header class="panel-heading b-light bg-light">
                            <strong>You have
                                <span class="count">
                                    No
                                </span> notifications
                            </strong>
                        </header>
                    </section>
                </div>
            </li>

            @guest
            <li>
                <a href="{{ route('login') }}">Login</a>
            </li>
            <li>
                <a href="{{ route('register') }}">Register</a>
            </li>
            @else

            <li class="dropdown">
                <a href="/manage/home#" class="dropdown-toggle" data-toggle="dropdown">
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
                        <a href="/manage/account/profile">Settings</a>
                    </li>
                        <!-- <li class="divider">
                        </li> -->
                        <li>
                            <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Logout
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