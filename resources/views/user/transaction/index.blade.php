@extends('user.index')
@section('content')
<div class="box box-solid">
	<div class="box-header with-border">
		<i class="fa fa-desktop"></i>
		<h4 class="box-title">Transaction History</h4>
		
	</div>
	<div class="box-body">
<div class="table-responsive">
	<table id="datatable" class="table table-bordered box-table">
		<thead>
			<tr>
				<th>SL</th>
				<th>Date</th>
				<th>From</th>
				<th>To</th>
				<th>Note</th>
				<th>Amount</th>
				<th>Fee</th>
				<th>Total</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1; ?>
		@foreach($data as $value)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{ $value->created_at->format('Y-m-d') }}</td>
				<td>{{ $value->from }}</td>
				<td>{{ $value->to }}</td>
				<td>{{ $value->note }}</td>
				<td>@if($value->type==5) <span style="color: red">-</span> @endif{{ $value->amount }}</td>
				<td>{{ $value->fee }}</td>
				<td>@if($value->type==5) <span style="color: red">-</span> @endif{{ $value->total }}</td>
				<td>@if($value->status==1) Approved @else Pending @endif</td>
			
			</tr>
		@endforeach
		</tbody>
	</table>
	</div>
	    </div>
</div>
@endsection