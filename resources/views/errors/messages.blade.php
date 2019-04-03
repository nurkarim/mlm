@if(Session::has('flash_success'))
	<div class="alert alert-success {{ Session::has('flash_msg_important') ? 'alert-important' : '' }}"> 
		@if(Session::has('flash_msg_important'))
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		@endif
		{{ Session('flash_success') }} 
	</div>
@endif

@if(Session::has('flash_error'))
	<div class="alert  alert-warning {{ Session::has('flash_msg_important') ? 'alert-important' : '' }}">
		@if(Session::has('flash_msg_important'))
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		@endif
		<strong>Warning!</strong> 
		{{ Session('flash_error') }} 
	</div>
@endif

 @if (session('success'))
	 <div class="alert alert-dismissible custom-alert alert-info php-error">
		 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		 <i class="icon fa fa-check-circle"></i> {{session('success')}}
	 </div>
 @endif
@if (session('error'))
	<div class="alert alert-dismissible custom-alert alert-danger php-error">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<i class="icon fa fa-check-circle"></i> {{session('error')}}
	</div>
@endif

 @if (count($errors) > 0)
	<div class="error">
		<ul class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			 @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
             @endforeach
		</ul>
	</div>
 @endif
<!-- Global uses ajax messages -->
<div class="alert alert-dismissible custom-alert alert-danger ajax-error" style="display: none">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<i class="icon fa fa-check-circle"></i><span></span>
</div>
<div class="alert alert-dismissible  custom-alert alert-success ajax-success" style="display:none;">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<i class="icon fa fa-check-circle"></i><span></span>
</div>

<!-- Predefined ajax messages -->


<div class="alert alert-dismissible custom-alert alert-success info-suc fixed" style="display:none;">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<i class="icon fa fa-check-circle"></i><span>Save Changes successfully</span>
</div>
<div class="alert alert-dismissible alert-danger info-error custom-alert" style="display:none;">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<i class="fa fa-warning"></i>There were some problems with your input.
	<ul></ul>
</div>

<div class="alert alert-dismissible alert-danger file-error custom-alert" style="display:none;">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<i class="fa fa-warning"></i><strong>Oh snap!</strong> There were some problem because your old existing file not found. <br/><br/>
</div>

<div class="alert alert-dismissible alert-warning db-error custom-alert" style="display:none;">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<i class="fa fa-warning"></i><strong>Oops!</strong> &nbsp;<label></label>
</div>
<div class="alert alert-dismissible alert-success delete-msg custom-alert" style="display:none;">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<i class="fa fa-check-circle"></i>Delete Record Successfully.
</div>
<div class="alert alert-dismissible alert-success raw-delete-msg custom-alert" style="display:none;">
	<i class="fa fa-check-circle"></i>Delete Record Successfully.
</div>
<div class="alert alert-dismissible alert-success inactive-msg custom-alert" style="display:none;">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<i class="fa fa-check-circle"></i>Inactive Record Successfully.
</div>
<div class="alert alert-dismissible alert-success active-msg custom-alert" style="display:none;">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<i class="fa fa-check-circle"></i>Active Record Successfully.
</div>
<div class="alert alert-dismissible alert-warning warning-msg custom-alert" style="display:none;">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<i class="fa fa-warning"></i>Something wrong! Please try again.
</div>
<div class="alert alert-dismissible alert-warning fk-msg custom-alert" style="display:none;">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<i class="fa fa-warning"></i>Already Used! You can't Delete it.
</div>
<div class="alert alert-dismissible alert-warning fk-constraint-msg custom-alert" style="display:none;">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<i class="fa fa-warning"></i>Already Used! You can't Delete it.
</div>
<div class="alert alert-dismissible alert-success info-suc-custome custom-alert" style="display:none;">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<i class="fa fa-check-circle"></i><label></label>
</div>

<div class="alert alert-dismissible alert-success info-suc-dynamic custom-alert" style="display:none;">
	<i class="fa fa-check-circle"></i><label></label>
</div>

<div class="alert alert-dismissible alert-success info-update-dynamic custom-alert" style="display:none;">
	<i class="fa fa-check-circle"></i><label></label>
</div>
<div class="loading" style="display:none;">
	Loading <img src="{{ asset('public/icons/loader.gif')}}" class="loading">
</div>
<script>
    $(document).ready(function() {
        $('.php-error').fadeIn(1000).delay(2000).fadeOut(1000);
    });
</script>
