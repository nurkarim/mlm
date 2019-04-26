<style type="text/css">
  .register-dropdown{
    padding-top: 8px;
    padding-left: 10px;
    text-transform: uppercase;
  }
  .register-dropdown a{
    text-decoration: none;
  }
  .register-dropdown >.dropdown-menu{

    min-width: 239px!important;
  } 
  .register-dropdown >.dropdown-menu li a{
    padding-left: 5px;
    color: black;
    font-size: 14px;
  }
</style>
<header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top main-nav">
        <div class="container">
        <a class=" navbar-band"  href="#"><img class="logo" src="{{ asset('public/ui/img/logo.png') }}"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""><i style="color: red;font-size: 35px;" class="fa fa-bars"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">

          <ul class="navbar-nav ml-auto">
            <!--<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarWelcome" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Welcome
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarWelcome">
                <a class="dropdown-item  active " href="#">Image</a>
              </div>
            </li> -->
            <li class="nav-item "><a href=" {{url('/')}} " class="nav-link">Home</a></li>
            <li class="nav-item "><a href="#aboutus" class="nav-link">About Us</a></li>
            <li class="nav-item "><a href="#why" class="nav-link">Our Story</a></li>
            <li class="nav-item "><a href="#about" class="nav-link">Services</a></li>
            @if(Auth::check())
            @if(Auth::user()->user_type==1)
             <li class="nav-item "><a href="{{ url('dashboard') }}" class="nav-link"><span style="color:#968145"><i class="fa fa-arrow-right"></i>Dashboard</span></a></li>
            @else
            <li class="nav-item "><a href="{{ url('admin') }}" class="nav-link"><span style="color:#968145"><i class="fa fa-arrow-right"></i> Admin</span></a></li>
            @endif
            @else
            <li class="nav-item "><a href="{{ route('login') }}" class="nav-link"><span style="color:#968145"><i class="fa fa-arrow-right"></i> Login</span></a></li>
            @endif

            <li class="nav-item dropdown register-dropdown"><a href="#"  data-toggle="dropdown" class="dropdown-toggle" class="nav-link"><span style="color:#968145"><i class="fa fa-check-circle-o"></i> Register Now</span></a>
                <ul class="dropdown-menu">
        <li><a href="{{ url('requestCode') }}">Need a Registration Code?</a></li>
        <li><a href="{{ route('register') }}">Got Code, Go to Registration</a></li>
    </ul>
            </li>
          </ul>
        </div>

        </div> <!--/container -->
      </nav>
    </header>