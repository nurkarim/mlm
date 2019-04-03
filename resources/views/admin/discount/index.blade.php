@extends('admin.index')
@section('content')

<div class="box box-solid">
	<div class="box-header with-border">
		<i class="fa fa-plus"></i>
		<h4 class="box-title">Discounts</h4>
	</div>
	<div class="box-body form-horizental">
	<form method="post" action="{{ route('discounts.store') }}">
		@csrf
		<div class="col-md-6">
		<div class="form-group">
			<label>User name</label>
			<input type="text" name="user_name" onchange="checkUserName()" id="user_name" class="form-control">
		</div>
		<div class="form-group">
			<label>Promo Code</label>
		<div class="input-group">
              <input type="text" id="code" class="form-control code-null" name="code"  autocomplete="off">
                <span class="input-group-btn">
                <button type="button"  readonly="true" class="btn btn-flat generate">Generate
                </button>
              </span>
         </div>
		</div>
		<div class="form-group">
			<button class="btn btn-save btn-primary"><i class="fa fa-save"></i> Save</button>
		</div>
		</div>
	</form>
    </div>
</div>

<div class="box box-solid">
	<div class="box-header with-border">
		<i class="fa fa-desktop"></i>
		<h4 class="box-title">Discounts List</h4>
	</div>
	<div class="box-body form-horizental">
	<div class="table-responsive">
	<table id="datatable" class="table table-bordered box-table">
		<thead>
			<tr>
				<th>SL</th>
				<th>User</th>
				<th>Code</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1; ?>
		@foreach($discounts as $discount)
		 <tr>
				<td>{{ $i++ }}</td>
				<td>{{ $discount->user->user_name }}</td>
				<td>{{ $discount->code }}</td>
				<td>
					@if($discount->status==1)
					<span class="label label-primary">Used</span>
					@else
					<span class="label label-danger">Unused</span>
					@endif
				</td>
				<td>
				<form method="post" action="{{ route('discounts.delete') }}">
					@csrf
					<input type="hidden" name="id" value="{{ $discount->id }}">
					<button class="btn btn-danger btn-xs" type="submit" onclick="return confirm('Are you sure you want to delete?');"><i class="fa fa-trash"></i></button>
				</form>	
				</td>
		</tr>
		@endforeach
		</tbody>
	</table>
	</div>
    </div>
</div>
<style type="text/css">
.error{border: 1px solid red;}
.success{border: 1px solid green;}
</style>
<input class="possible" type="hidden" placeholder="Possible characters" value="ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789">
@section('js')
<script type="text/javascript">
var generated = [],
    possible  = $(".possible").val() ? $(".possible").val() : "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
function generateCodes(number, length) {
	generated=[];
   $("#code").val(" ");
  for ( var i=0; i < number; i++ ) {
    generateCode(length);
  }
 	
  $("#code").val(generated.join("\n"));

}
function generateCode(length) {
  var text = "";

  for ( var i=0; i < length; i++ ) {
    text += possible.charAt(Math.floor(Math.random() * possible.length));
  }

  if ( generated.indexOf(text) == -1 ) {
    generated.push(text);
  }else {
    generateCode();
  }
}
$(".generate").on("click", function(e) {

  var num = $(".count").val() ? $(".count").val() : 1,
      len = $(".length").val() ? $(".length").val() : 6;
      possible  = $(".possible").val() ? $(".possible").val() : "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
      
  generateCodes(num, len);
  
  
});

// ============================check user name=====================
	function checkUserName() {
    		var userName=$("#user_name").val();
    		       $.ajax({
                type: 'GET',
                async:false,
                url: '{{ route('userName.check') }}?userName='+userName,
                dataType: "json",
                success: function(data) {
                if (data.status==true) {
					$('#user_name').removeClass('error').addClass('success');
                	}else{
					$('#user_name').removeClass('success').addClass('error');
                	}
                },
                error: function(data) {
                }
            });
    	}
</script>
@endsection

@endsection