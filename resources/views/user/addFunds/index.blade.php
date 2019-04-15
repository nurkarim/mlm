@extends('user.index')
@section('content')
<div class="box box-solid">
	<div class="box-header with-border">
		<i class="fa fa-desktop"></i>
		<h4 class="box-title">Funds History</h4>
		
	</div>
	<div class="box-body">
	<div class="table-responsive">
	<table id="datatable" class="table table-bordered box-table">
		<thead>
			<tr>
				<th>SL</th>
				<th>Type</th>
				<th>Amount</th>
				<th>Stripe/Bitcoin Fee</th>
				<th>Total</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1; ?>
		@foreach($funds as $fund)
			<tr>
				<td>{{ $i++ }}</td>
				<td>@if($fund->type==1) Stripe @else Coinpayment @endif</td>
				<td>{{ $fund->amount }}</td>
				<td>{{ $fund->fee }}</td>
				<td>{{ $fund->total }}</td>
				<td>@if($fund->status==1) Approved @else Pending @endif</td>
			
			</tr>
		@endforeach
		</tbody>
	</table>
	</div>
    </div>
</div>
@endsection