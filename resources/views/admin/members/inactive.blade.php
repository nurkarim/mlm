@extends('admin.index')
@section('content')
<div class="box box-solid">
	<div class="box-header with-border">
		<i class="fa fa-desktop"></i>
		<h4 class="box-title">Inactive Members List</h4>
		
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
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1; ?>
		@foreach($users as $user)
			<tr>
				<td>{{ $i++ }}</td>
				<td><a href="#">{{ $user->user_name }}</a></td>
				<td><a href="#">{{ $user->refferral->user_name }}</a></td>
				<td><a href="#">{{ $user->placementUser->user_name }}</a></td>
				<td>{{ $user->funds_amount }}</td>
				<td>
		         <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal" onclick="loadModal('{{route('members.show',$user->id)}}')">
		         	<i class="fa fa-edit"></i>
		         </button>
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
	</div>
    </div>
</div>


@endsection