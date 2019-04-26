<section id="footer">
      <div class="container">
       
      
        <div class="row copyright">
        <div class="col-md-4">
        <img class="logo" src="{{ asset('public/ui/img/logo.png') }}">
        </div>
          <div class="col-md-8 text-right">
            <p>Phone: 404-458-4448  |  Email: info@infinite-funds.com</p>
            <p> <a href="javascript:void()">Terms Of Use</a> |  <a href="javascript:void()"> Privacy Policy </a> | Copyright 2019 Infinite Funds</p>
          </div>
        </div>
      </div>
    </section>




    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    {{-- <script src="{{ asset('public/ui/js/jquery-3.3.1.slim.min.js') }}" ></script> --}}
    <script src="{{ asset('public/ui/js/popper.min.js') }}"></script>
    <script src="{{ asset('public/ui/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/ui/js/wow.js') }}"></script>
    <script>
    new WOW().init();
    
    </script>
   
  <script type="text/javascript">

      $('a').click(function(){
        $('html, body').animate({
          scrollTop: $( $(this).attr('href') ).offset().top
        }, 1000);
        return false;
      });

      
  </script> 

@yield('js')
