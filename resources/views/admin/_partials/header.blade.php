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
                    <img src="{{ asset('public/icons/profile.png') }}" class="user-image" alt="User Image">
                    <span class="hidden-xs">Admin</span>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                        <img src="{{ asset('public/icons/profile.png') }}" class="img-circle" alt="User Image">

                        <p>
                            Admin
                            <small>Admin</small>
                        </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="pull-left">
                            <a href="#" class="btn btn-default btn-flat">Profile</a>
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