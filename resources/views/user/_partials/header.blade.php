<nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </a>
    <a class="navbar-brand hidden-xs" href="#"> INF</a>
    <a class="navbar-brand visible-xs" href="#"> Infinite-Funds</a>
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="@if(Auth::user()->image!=null)  {{ url('public/users/',Auth::user()->image) }}  @else {{ asset('public/icons/profile.png') }} @endif" class="user-image" alt="User Image">
                    <span class="hidden-xs">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                        <img src="@if(Auth::user()->image!=null)  {{ url('public/users/',Auth::user()->image) }}  @else {{ asset('public/icons/profile.png') }} @endif" class="img-circle" alt="User Image">

                        <p>
                            {{ Auth::user()->name }}
                            <small>{{ Auth::user()->name }}</small>
                        </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="pull-left">
                            <a href="{{ route('user.profile') }}" class="btn btn-default btn-flat">Profile</a>
                        </div>
                        <div class="pull-right">
                            <a href="{{ URL::to("logout") }}" class="btn btn-default btn-flat">Sign out</a>
                        </div>
                    </li>
                </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <li>
                <a href="{{ URL::to("logout") }}"><i class="fa fa-sign-out"></i></a>
            </li>
        </ul>
    </div>
</nav>