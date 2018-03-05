<header class="bg-dark lt header navbar navbar-fixed-top-xs">

    <div class="navbar-header bg-dark aside-md">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
            <i class="fa fa-bars">
            </i>
        </a>
        <a href="/" class="navbar-brand" data-toggle="fullscreen">
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
            <li>
                <a href="{{route('user.dashboard')}}"> @lang('lang.user_area')</a>
            </li>
            
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
            <a href="#" class="dropdown-toggle dk" data-toggle="dropdown">
                <i class="fa fa-bell"> </i>
            </a>
            <div class="dropdown-menu aside-xl">
                <section class="panel bg-white">
                    <header class="panel-heading b-light bg-light">
                        <strong>@lang('lang.dont_have')
                            <span class="count">
                                
                            </span> @lang('lang.notifications')</strong>
                        </header>
                    </section>
                </div>
            </li>
            @include('tools.partials.auth')        
        </ul>

</header>