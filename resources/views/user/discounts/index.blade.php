@extends('user.index')
@section('content')

<div class="box box-solid">
	<div class="box-header with-border">
		<i class="fa fa-plus"></i>
		<h4 class="box-title">Purchase Discount Code</h4>
	</div>
	<div class="box-body form-horizental">
	<form method="post" action="{{ route('discounts.store') }}">
		@csrf
		<div class="col-md-6">
		<div class="form-group">
			<label>Make Discount Code</label>
		<div class="input-group">
              <input type="text" id="code" class="form-control code-null" name="code"  autocomplete="off" required="">
                <span class="input-group-btn">
                <button type="button"  readonly="true" class="btn btn-flat generate">Generate
                </button>
              </span>
         </div>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-save btn-primary" onclick="return confirm('Are you sure  want to purchase this code?');"><i class="fa fa-shopping-cart"></i> Purchase  Code ($0.50)</button>
		</div>
		</div>
		<input type="hidden" name="amount" value="0.50">
	</form>
    </div>
</div>
<div class="box box-solid">
	<div class="box-header with-border">
		<i class="fa fa-desktop"></i>
		<h4 class="box-title">My Discounts List</h4>
		
	</div>
	<div class="box-body">
	<div class="table-responsive">
	<table id="datatable" class="table table-bordered box-table">
		<thead>
			<tr>
				<th>SL</th>
				<th>Date</th>
				<th>Discount Code</th>
				<th>Fee</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1; ?>
		@foreach($data as $value)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{ $value->created_at->format('Y-m-d') }}</td>
				<td>{{ $value->code }}</td>
				<td>{{ $value->amount }}</td>
				<td>@if($value->status==1) <span class="label label-danger">Used</span> @else <span class="label label-primary">New</span> @endif</td>
			
			</tr>
		@endforeach
		</tbody>
	</table>
	</div>
    </div>
</div>

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


</script>
@endsection
@endsection