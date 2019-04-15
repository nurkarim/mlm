@extends('user.index')
@section('content')

<div class="box box-solid">
	<div class="box-header with-border">
		<i class="fa fa-user"></i>
		<h4 class="box-title">Password Change</h4>
	</div>
	<div class="box-body">
	<form method="post" class="form-horizontal" enctype="multipart/form-data" action="{{ route('user.storePassword') }}">
		@csrf
		<div class="col-md-8">

		<div class="form-group">
	    <label for="password_old" class="col-sm-3 col-form-label">Old Password</label>
                                            <div class="col-sm-9">
                                            	<input type="password" name="password_old" class="form-control">
                                         
        </div>
		</div>
		<div class="form-group">
	    <label for="password" class="col-sm-3 col-form-label">New  Password</label>
                                            <div class="col-sm-9">
                                            	<input type="password" name="password" class="form-control">
                                              
                                            </div>
		</div>
		<div class="form-group">
	    <label for="password_conf" class="col-sm-3 col-form-label">Repeat Password</label>
           <div class="col-sm-9">
           		<input type="password" name="password_conf" class="form-control">
                                      
          </div>
		</div>		

	

         <div class="form-group">
         	<div class="col-sm-3">
         	</div>
         	<div class="col-sm-9">
			<button type="submit" class="btn btn-sm btn-primary">Update Password</button>
		</div>
		</div>
	</div>
    </form>
    </div>
</div>


@section('js')


@endsection
@endsection