@extends('user.index')
@section('content')
<div class="box box-solid">
	<div class="box-header with-border">
		<i class="fa fa-desktop"></i>
		<h4 class="box-title">Funds Transfer History</h4>
		
	</div>
	<div class="box-body">
	<div class="table-responsive">
	<table id="datatable" class="table table-bordered box-table">
		<thead>
			<tr>
				<th>SL</th>
				<th>Date</th>
				<th>To</th>
				<th>Amount</th>
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
				<td>{{ $value->user->user_name }}</td>
				<td>{{ $value->amount }}</td>
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