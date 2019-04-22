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
				<td>
					@if($value->status==1)
					<span class="label label-primary">Send</span>
					@else
					<span class="label label-info">New Request</span>
					@endif
				</td>
				<td>
				<button class="btn bnt-xs btn-primary btn-xs" data-toggle="modal" data-target="#modal" onclick="loadModal('{{route('register.requestEdit',$value->id)}}')"> Action </button>
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