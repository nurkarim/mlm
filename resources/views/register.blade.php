@extends('index')
@section('content')
<section class="intro">
  

        <div class="misc-wrapper">
            <div class="misc-content">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-4 col-xs-12">
                              <div class="misc-header text-center">
                                <h4 style="font-weight: bold;">Signup A Free Account </h4>
                            </div>
                            <div class="misc-box">   
                               
                                  <form role="form" method="POST" action="">
                                   <div class="form-group">
                                        <label for="name">Full Name</label>
                                        <div class="group-icon">
                                        <input id="name" type="text" autocomplete="off" placeholder="Enter your full name " class="form-control email-text" required="" value="" name="email">
                                        <span class="icon-user text-muted icon-input"></span>
                                        </div>
                                 </div>
                                  <div class="form-group">
                                        <label for="username">User Name</label>
                                        <div class="group-icon">
                                        <input id="username" type="text" autocomplete="off" placeholder="Enter a unique username" class="form-control email-text" required="" value="" name="email">
                                        <span class="icon-user text-muted icon-input"></span>
                                        </div>
                                 </div>
                                   <div class="form-group">
                                        <label for="email">Email</label>
                                        <div class="group-icon">
                                        <input id="email" type="email" autocomplete="off" placeholder="valid email address" class="form-control email-text" required="" value="" name="email">
                                        <span class="icon-user text-muted icon-input"></span>
                                        </div>
                                 </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <div class="group-icon">
                                        <input id="exampleInputPassword1" autocomplete="off" type="password" placeholder="Enter a strong password (@!passwoed!@123)" class="form-control password-text" name="password" required="">
                                        <span class="icon-lock text-muted icon-input"></span>
                                        </div>
                                   </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Referral username</label>
                                        <div class="group-icon">
                                        <input id="exampleInputPassword1" autocomplete="off" type="password" placeholder="Enter a referral username" class="form-control password-text" name="password" required="">
                                        <span class="icon-lock text-muted icon-input"></span>
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <label for="exampleInputPassword1">Promo Code</label>
                                        <div class="group-icon">
                                        <input id="exampleInputPassword1" autocomplete="off" type="password" placeholder="Enter a discount code" class="form-control password-text" name="password" required="">
                                        <span class="icon-lock text-muted icon-input"></span>
                                        </div>
                                   </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Placement username</label>
                                        <div class="group-icon">
                                        <input id="exampleInputPassword1" autocomplete="off" type="password" placeholder="Enter a position username" class="form-control password-text" name="password" required="">
                                        <span class="icon-lock text-muted icon-input"></span>
                                        </div>
                                   </div>
                                    <div class="clearfix">
                                       
                                        <div class="float-left">
                                            <button type="submit" class="btn btn-block btn-pink btn-rounded box-shadow">Registration</button>
                                        </div>
                                    </div>
                                    <hr>
                                    <p class="text-center">Already have signup ?<br><a class="btn btn-link" href="#">
                                     <a href="{{ route('login') }}" class=" btn-link ">Login Now</a></p>
                                    
                                </form>
                            </div>
                            <div class="text-center misc-footer">
                               <p>Copyright © 2018 </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection