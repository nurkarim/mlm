@extends('index')
@section('content')
<section class="intro">
  
@include('errors.messages')
        <div class="misc-wrapper">
            <div class="misc-content">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-xs-12">
                              <div class="misc-header text-center">
                                <h4 style="font-weight: bold;">Thank You</h4>
                            </div>
                            <div class="misc-box">   
                     <h4 style="font-weight: bold;">
You have successfully requested a code.We will provide your info to a current member that is ready to pif(Pay it forward) you in.</h4>
                                 
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