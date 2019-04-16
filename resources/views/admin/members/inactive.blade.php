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
				<td><a href="{{ route('members.show',$user->id) }}">{{ $user->user_name }}</a></td>
				<td><a href="{{ route('members.show',$user->refferral->id) }}">{{ $user->refferral->user_name }}</a></td>
				<td><a href="{{ route('members.show',$user->placementUser->id) }}">{{ $user->placementUser->user_name }}</a></td>
				<td>{{ $user->funds_amount }}</td>
				<td>
		         <a  data-toggle="modal" data-target="#modal" onclick="loadModal('{{ route('members.action',$user->id) }}')" class="btn btn-info btn-xs" href="#">Action</a>
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
	</div>
    </div>
</div>


@endsection