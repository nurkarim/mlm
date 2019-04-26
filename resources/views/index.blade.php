
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('public/ui/img/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('public/ui/css/bootstrap.min.css') }}">
    <link href="{{ asset('public/ui/css/carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('public/ui/css/font-awesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/ui/css/animate.css') }}">
    <link href="{{ asset('public/ui/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('public/ui/css/responsive.css') }}" rel="stylesheet">
        <script src="{{asset('public/theme1/js/jquery.min.js')}}"></script>
    <link href="{{ asset('public/css/animation.css') }}" rel="stylesheet">

    <title>Infinite-Funds</title>
  </head>
@include('_partials.nav')
  <body>
    
  @yield('content')
   
@include('_partials.footer')
<style type="text/css">
  
</style>
  </body>
</html>