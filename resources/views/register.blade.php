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
                                <h4 style="font-weight: bold;">Signup</h4>
                            </div>
                            <div class="misc-box">   
                               
                                  <form role="form" method="POST" action="{{ route('register.store') }}">
                                    @csrf
                                   <div class="form-group">
                                        <label for="name">Full Name</label>
                                        <div class="group-icon">
                                        <input id="name" type="text" autocomplete="off" placeholder="Enter your full name " class="form-control email-text" required=""  name="name">
                                        <span class="icon-user text-muted icon-input"></span>
                                        </div>
                                 </div>
                                  <div class="form-group">
                                        <label for="username">User Name</label>
                                        <div class="group-icon">
                                        <input id="user_name" type="text" autocomplete="off" placeholder="Enter a unique username" class="form-control email-text" required="" name="user_name" onchange="checkUserName()" minlength="9" maxlength="9">
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
                                        <label for="referral">Referral</label>
                                        <div class="group-icon">
                                        <input id="referral" autocomplete="off" type="text" placeholder="Enter a referral username" class="form-control password-text" name="referral" required="" onchange="checkRefarral()" value="@if(Session::has('user_name')) {{ Session::get('user_name') }} @endif">
                                        <span class="icon-lock text-muted icon-input"></span>
                                        </div>
                                   </div>
                               
                                    <div class="form-group">
                                        <label for="placement_name">Position</label>
                                        <div class="group-icon">
                                        <input id="placement_name" autocomplete="off" type="text" placeholder="Enter a position username" class="form-control password-text" onchange="checkPosition()" name="placement_name" required="" value="@if(Session::has('user_name')) {{ Session::get('user_name') }} @endif">
                                        <span class="icon-lock text-muted icon-input"></span>
                                        </div>
                                   </div>
                                       <div class="form-group">
                                        <label for="discount">Promo Code</label>
                                        <div class="group-icon">
                                        <input id="discount" autocomplete="off" type="text" placeholder="Enter a discount code from referral" class="form-control password-text" name="discount" required="" onchange="discountCh()">
                                        <span class="icon-lock text-muted icon-input sms-disc"></span>
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
    <style type="text/css">
.error{border: 1px solid red;}
.success{border: 1px solid green;}
</style>
@section('js')
<script type="text/javascript">
function checkUserName() {
            var userName=$("#user_name").val();
                   $.ajax({
                type: 'GET',
                async:false,
                url: '{{ route('userNameCheck') }}?userName='+userName,
                dataType: "json",
                success: function(data) {
                if (data.status==true) {
                    $('#user_name').removeClass('success').addClass('error');
                    }else{
                    $('#user_name').removeClass('error').addClass('success');
                    }
                },
                error: function(data) {
                }
            });
}

function checkRefarral() {
            var userName=$("#referral").val();
                   $.ajax({
                type: 'GET',
                async:false,
                url: '{{ route('userNameCheck') }}?userName='+userName,
                dataType: "json",
                success: function(data) {
                if (data.status==true) {
                    $('#referral').removeClass('error').addClass('success');
                    }else{
                    $('#referral').removeClass('success').addClass('error');
                    }
                },
                error: function(data) {
                }
            });
}

function checkPosition() {
            var userName=$("#placement_name").val();
                   $.ajax({
                type: 'GET',
                async:false,
                url: '{{ route('userNameCheck') }}?userName='+userName,
                dataType: "json",
                success: function(data) {
                if (data.status==true) {
                    $('#placement_name').removeClass('error').addClass('success');
                    position(userName);
                    }else{
                    $('#placement_name').removeClass('success').addClass('error');
                    }
                },
                error: function(data) {
                }
            });
}

function position(userName) {
         $.ajax({
                type: 'GET',
                async:false,
                url: '{{ route('checkPosition') }}?userName='+userName,
                dataType: "json",
                success: function(data) {
                if (data.status==true) {
                    alert('Sorry! position Fill up');
                    }else{
                    
                    }
                },
                error: function(data) {
                }
            });
}
function discountCh() {
         $.ajax({
                type: 'GET',
                async:false,
                url: '{{ route('checkDiscountCode') }}?code='+$('#discount').val(),
                dataType: "json",
                success: function(data) {
                if (data.status==true) {
                    $('#discount').removeClass('error').addClass('success');
                      $('.sms-disc').html('');
                    }else{
                      $('.sms-disc').html('This code already used.');
                    }
                },
                error: function(data) {
                }
            });
}
</script>
@endsection
@endsection