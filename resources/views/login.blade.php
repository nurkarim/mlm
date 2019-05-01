@extends('index')
@section('content')
<section class="intro">
  

        <div class="misc-wrapper">
            <div class="misc-content">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-4 col-xs-12">
                              <div class="misc-header text-center">
                                <h4 style="font-weight: bold;">Login</h4>
                            </div>
                            <div class="misc-box">   
                               
                                  <form role="form" method="POST" action="{{ route('login') }}">
          @csrf                                    <div class="form-group">
                                        <label for="email">Username</label>
                                        <div class="group-icon">
                                        <input id="email" type="text"  placeholder="Enter username" class="form-control email-text" required="" value="" name="email">
                                        <span class="icon-user text-muted icon-input"></span>
                                        </div>
                                                                             </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <div class="group-icon">
                                        <input id="exampleInputPassword1" type="password" placeholder="Password" class="form-control password-text" name="password" required="">
                                        <span class="icon-lock text-muted icon-input"></span>
                                        </div>
                                                                              </div>
                                    <div class="clearfix">
                                        <div class="float-left">
                                           <div class="checkbox checkbox-primary margin-r-5">
                                                <input name="remember" id="remember" type="checkbox" checked="">
                                                <label for="remember"> Remember Me </label>
                                            </div>
                                        </div>
                                        <div class="float-right">
                                            <button type="submit" class="btn btn-block btn-pink btn-rounded box-shadow">Login</button>
                                        </div>
                                    </div>
                                    <hr>
                                    <p class="text-center"><a class="btn btn-link" href="{{route('password.reset')}}">
                                    Forgot Your Password?
                                </a> | <a href="#" class=" btn-link ">Register Now</a></p>
                                    
                                </form>
                            </div>
                            <div class="text-center misc-footer">
                               <p>Copyright © 2019 </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection