@extends('index')
@section('content')
<section class="intro">
  
@include('errors.messages')
        <div class="misc-wrapper">
            <div class="misc-content">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-4 col-xs-12">
                              <div class="misc-header text-center">
                                <h4 style="font-weight: bold;">Request Code</h4>
                            </div>
                            <div class="misc-box">   
                               
                                  <form role="form" method="POST" action="{{ route('requestCode.store') }}">
          @csrf                           <div class="form-group">
                                        <label for="email">Name</label>
                                        <div class="group-icon">
                                        <input id="email" type="text"  placeholder="Enter full name" class="form-control email-text" required="" value="" name="fullName">
                                        <span class="icon-user text-muted icon-input"></span>
                                        </div>
                                       </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <div class="group-icon">
                                        <input id="email" type="email" placeholder="Enter your valid email address" class="form-control password-text" name="email" required="">
                                        <span class="icon-lock text-muted icon-input"></span>
                                        </div>
                                                                              </div>    
                                 <div class="form-group">
                                        <label for="username">Preferred username</label>
                                        <div class="group-icon">
                                        <input id="username" type="username" placeholder="Enter your  preferred username " class="form-control password-text" name="user_name" required="" maxlength="9" minlength="9">
                                        <span class="icon-lock text-muted icon-input"></span>
                                        </div>
                                                                              </div>
                                    <div class="clearfix">
                                        <div class="float-left">
                                           <div class="checkbox checkbox-primary margin-r-5">
                                            
                                            </div>
                                        </div>
                                        <div class="float-right">
                                            <button type="submit" class="btn btn-block btn-pink btn-rounded box-shadow">Request</button>
                                        </div>
                                    </div>
                                    <hr>
                                    <p class="text-center"> <a href="#" class=" btn-link ">Register Now</a></p>
                                    
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