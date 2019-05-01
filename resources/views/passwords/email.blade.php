@extends('index')
@section('content')
<section class="intro">
                  @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
   

        <div class="misc-wrapper">
            <div class="misc-content">
                <div class="container">
                    <div class="row justify-content-center">

                        <div class="col-md-4">
                              <div class="misc-header text-center">
                                <h4 style="font-weight: bold;">Reset Password</h4>
                            </div>
                            <div class="misc-box">   
                               
                               <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group">
                           

                            
                                <input id="email" type="text" class="form-control {{ $errors->has('user_name') ? ' is-invalid' : '' }} email-text" name="user_name" value="{{ old('email') }}" required placeholder="Enter your username">

                                @if ($errors->has('user_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('user_name') }}</strong>
                                    </span>
                                @endif
                           
                        </div>

                        <div class="form-group">
                     
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            
                        </div>
                    </form>
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection