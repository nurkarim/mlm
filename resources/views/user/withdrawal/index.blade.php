@extends('user.index')
@section('content')
<div class="box box-solid">
	<div class="box-header with-border">
		<i class="fa fa-desktop"></i>
		<h4 class="box-title">Withdrawal History</h4>
		
	</div>
	<div class="box-body">
	<div class="table-responsive">
	<table id="datatable" class="table table-bordered box-table">
		<thead>
			<tr>
				<th>SL</th>
				<th>Date</th>
				<th>Wallet Address</th>
				<th>Amount</th>
				<th>Fee</th>
				<th>Total</th>
				<th>Remark</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1; ?>
		@foreach($data as $value)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{ $value->created_at->format('Y-m-d') }}</td>
				<td>{{ $value->wallet_address }}</td>
				<td>{{ $value->amount }}</td>
				<td>{{ $value->fee }}</td>
				<td>{{ $value->total }}</td>
				<td>{{ $value->remark }}</td>
				<td>@if($value->status==1) Approved @else Pending @endif</td>
			
			</tr>
		@endforeach
		</tbody>
	</table>
	</div>
    </div>
</div>
@endsection