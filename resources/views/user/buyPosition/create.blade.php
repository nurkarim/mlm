@extends('user.index')
@section('content')
<div class="box box-solid">
	<div class="box-header">
		<div class="pull-right">
			<b>Available Funds</b> <i class="fa fa-dollar"></i>
		<h4 class="box-title">{{ Auth::user()->funds_amount }}</h4>
		
		</div>
	</div>
</div>
<div class="box box-solid">
	<div class="box-header with-border">
		<i class="fa fa-plus"></i>
		<h4 class="box-title">Buying Position</h4>
		
	</div>
	<div class="box-body form-horizental">
	<form method="post" action="{{ route('position.post') }}">
		@csrf
		<div class="col-md-6">
		<div class="form-group">
			<label>Name</label>
			<input type="text" name="name" required="" class="form-control" value="{{ old('name') }}">
		</div>
		<div class="form-group">
			<label>E-mail</label>
			<input type="email"  name="email" required=""  value="{{ Auth::user()->email }}" class="form-control">
		</div>
		<div class="form-group">
			<label>Username</label>
			<input type="text" name="user_name" required="" class="form-control" value="{{ old('user_name') }}" maxlength="9" minlength="9">
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" name="password" required="" class="form-control">
		</div>
		<div class="form-group">
			<label>Referral</label>
			<input type="text" name="referral" readonly="" required="" class="form-control" value="{{ Auth::user()->user_name }}">
		</div>
		<div class="form-group">
			<label>Position</label>
			<input type="text" name="placement_name" required="" class="form-control" value="{{ old('placement_name') }}">
		</div>
       <div class="form-group">
			<button type="submit" class="btn btn-sm btn-primary">Buy Position</button>
		</div>
		</div>
		
	</form>
    </div>
</div>
<p><b>Notes:</b></p>
<p>1.Every positions fee $0.50USD  </p>
<p>2.Limitation buying position per day 5 position.  </p>
@endsection