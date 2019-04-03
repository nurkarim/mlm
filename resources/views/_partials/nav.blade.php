<header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top main-nav">
        <div class="container">
        <a class=" navbar-band"  href="#"><img class="logo" src="{{ asset('public/ui/img/logo.png') }}"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
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
            
            <li class="nav-item "><a href="{{ route('login') }}" class="nav-link"><span style="color:#968145"><i class="fa fa-arrow-right"></i> Login</span></a></li>
            <li class="nav-item "><a href="{{ route('register') }}" class="nav-link"><span style="color:#968145"><i class="fa fa-check-circle-o"></i> Register Now</span></a></li>
          </ul>
        </div>

        </div> <!--/container -->
      </nav>
    </header>