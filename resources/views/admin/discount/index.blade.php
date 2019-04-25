@extends('admin.index')
@section('content')



<div class="box box-solid">
	<div class="box-header with-border">
		<i class="fa fa-desktop"></i>
		<h4 class="box-title">Purchase Discount List</h4>
	</div>
	<div class="box-body form-horizental">
	<div class="table-responsive">
	<table id="datatable" class="table table-bordered box-table">
		<thead>
			<tr>
				<th>SL</th>
			    <th>Date</th>
				<th>Username</th>
				<th>Code</th>
				<th>Amount</th>
				<th>Status</th>
		
			</tr>
		</thead>
		<tbody>
			<?php $i=1; ?>
		   @foreach($discounts as $discount)
		 <tr>
				<td>{{ $i++ }}</td>
				<td>{{ $discount->created_at->format('Y-m-d') }}</td>
				<td>{{ $discount->user->user_name }}</td>
				<td>{{ $discount->code }}</td>
				<td>{{ $discount->amount }}</td>
				<td>
					@if($discount->status==1)
					<span class="label label-primary">Used</span>
					@else
					<span class="label label-danger">Unused</span>
					@endif
				</td>
			{{-- 	<td>
				<form method="post" action="{{ route('discounts.delete') }}">
					@csrf
					<input type="hidden" name="id" value="{{ $discount->id }}">
					<button class="btn btn-danger btn-xs" type="submit" onclick="return confirm('Are you sure you want to delete?');"><i class="fa fa-trash"></i></button>
				</form>	
				</td> --}}
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


@endsection