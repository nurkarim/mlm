@extends('user.index')
@section('content')
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
@endsection