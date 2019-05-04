@extends('admin.index')
@section('content')

<div class="box box-solid">
	<div class="box-header with-border">
		<i class="fa fa-desktop"></i>
		<h4 class="box-title"> Code Requested List</h4>
	</div>
	<div class="box-body form-horizental">
	<div class="table-responsive">
	<table id="datatable" class="table table-bordered box-table">
		<thead>
			<tr>
				<th>SL</th>
				<th>Full Name</th>
				<th>Email</th>
				<th>Username</th>
				<th>Status</th>
				
			</tr>
		</thead>
		<tbody>
			<?php $i=1; ?>
		   @foreach($codeRequest as $value)
		 <tr>
				<td>{{ $i++ }}</td>
				<td>{{ $value->full_name }}</td>
				<td>{{ $value->email }}</td>
				<td>{{ $value->user_name }}</td>
				<td>
				<form method="post" action="{{ route('requestCode.delete') }}">
					@csrf
					<input type="hidden" name="id" value="{{ $value->id }}">
					<button class="btn btn-danger btn-xs" type="submit" onclick="return confirm('Are you sure you want to delete?');"><i class="fa fa-trash"></i></button>
				</form>	
				</td>
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

@section('js')

@endsection

@endsection