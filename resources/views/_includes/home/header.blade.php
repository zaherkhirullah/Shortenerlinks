<header id="header" class="header">
        <div class="container">
            <h1 class="logo">
                <a href="{{url('/')}}">
                     <i class="ion ion-ios-rose-outline" ></i>
                       Shorter Links
                     <i class="ion ion-ios-rose-outline" ></i>
                </a>
            </h1>
            <nav class="main-nav navbar-right" role="navigation">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"> </span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div id="navbar-collapse" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active nav-item">
                            <a href="{{url('/')}}">  <i class="fa fa-home" aria-hidden="true"></i>  @lang('lang.home')</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/rates')}}">
                              <i class="ion ion-cash" aria-hidden="true"></i> @lang('lang.payout_rates')</a>
                        </li>
                         <li class="nav-item">
                            <a href="{{url('/contacts')}}">
                              <i class="fa fa-phone" aria-hidden="true"></i> @lang('lang.contact_us')</a>
                        </li>
                        <li class="dropdown nav-item">
                            <a href="#" class="dropdown-toggle" type="button" data-toggle="dropdown">  
                                <i class="fa fa-language" aria-hidden="true"></i> 
                                <span class="caret"></span>
                            </a> 

                            <ul class="dropdown-menu">
                            <li>    <a href="{{route('lang','en')}}">English</a></li>
                                <li><a href="{{route('lang','ar')}}">العربية</a></li>
                            </ul>

                        </li>
                        @include('tools.partials.auth')
                    </ul>
                </div>
            </nav>
        </div>
    </header>