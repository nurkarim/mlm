@extends('user.index')
@section('content')

<div class="box box-solid">
	<div class="box-header with-border">
		<i class="fa fa-user"></i>
		<h4 class="box-title">Profile</h4>
	</div>
	<div class="box-body">
	<form method="post" class="form-horizontal" enctype="multipart/form-data" action="{{ route('user.profileUpdate') }}">
		@csrf
		<div class="col-md-6">

		<div class="form-group">
	    <label for="name" class="col-sm-3 col-form-label">Full Name</label>
                                            <div class="col-sm-9">
                                                {!! Form::text('name',Auth::user()->name , ['class'=>' form-control','id'=>'name','placeholder'=>'','required'=>true]) !!}
        </div>
		</div>
		<div class="form-group">
	    <label for="email" class="col-sm-3 col-form-label">Email</label>
                                            <div class="col-sm-9">
                                                {!! Form::text('email',Auth::user()->email , ['class'=>' form-control','id'=>'email','placeholder'=>'','required'=>true]) !!}
                                            </div>
		</div>
		<div class="form-group">
	    <label for="phone" class="col-sm-3 col-form-label">Phone</label>
           <div class="col-sm-9">
                                                {!! Form::text('phone',Auth::user()->phone, ['class'=>' form-control','id'=>'phone','placeholder'=>'']) !!}
          </div>
		</div>		

		<div class="form-group">
	    <label for="city" class="col-sm-3 col-form-label">City</label>
           <div class="col-sm-9">
            {!! Form::text('city',Auth::user()->city , ['class'=>' form-control','id'=>'city','placeholder'=>'']) !!}
          </div>
		</div>	

		<div class="form-group">
	    <label for="country" class="col-sm-3 col-form-label">Country</label>
           <div class="col-sm-9">
                                                {!! Form::text('country',Auth::user()->country , ['class'=>' form-control','id'=>'city','placeholder'=>'']) !!}
          </div>
		</div>

		<div class="form-group">
	    <label for="address" class="col-sm-3 col-form-label">Address</label>
           <div class="col-sm-9">
                                                {!! Form::text('address',Auth::user()->address , ['class'=>' form-control','id'=>'city','placeholder'=>'']) !!}
          </div>
		</div>	

		<div class="form-group">
	    <label for="image" class="col-sm-3 col-form-label">Avatar</label>
           <div class="col-sm-9">
                                                {!! Form::file('image',null , ['class'=>' form-control','id'=>'city','placeholder'=>'']) !!}
          </div>
		</div>
	

         <div class="form-group">
         	<div class="col-sm-3">
         	</div>
         	<div class="col-sm-9">
			<button type="submit" class="btn btn-sm btn-primary">Update profile</button>
		</div>
		</div>
	</div>
    </form>
    </div>
</div>


@section('js')


@endsection
@endsection