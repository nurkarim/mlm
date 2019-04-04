@extends('admin.index')
@section('content')
<div class="box box-solid">
	<div class="box-header with-border">
		<i class="fa fa-desktop"></i>
		<h4 class="box-title">Active Members List</h4>
		
	</div>
	<div class="box-body form-horizental">
	<div class="table-responsive">
	<table id="datatable" class="table table-bordered box-table">
		<thead>
			<tr>
				<th>SL</th>
				<th>Username</th>
				<th>Referral ID</th>
				<th>Position ID</th>
				<th>Funding Wallet</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1; ?>
		@foreach($users as $user)
			<tr>
				<td>{{ $i++ }}</td>
				<td><a href="{{ route('members.show',$user->id) }}">{{ $user->user_name }}</a></td>
				<td><a href="{{ route('members.show',$user->referral_id) }}">{{ $user->refferral->user_name }}</a></td>
				<td><a href="{{ route('members.show',$user->placement_id) }}">{{ $user->placementUser->user_name }}</a></td>
				<td>{{ $user->funds_amount }}</td>
				<td><label class="label label-success">Active</label></td>
				
			</tr>
		@endforeach
		</tbody>
	</table>
	</div>
    </div>
</div>


@endsection