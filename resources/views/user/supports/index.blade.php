@extends('user.index')
@section('content')
<div class="box box-solid">
	<div class="box-header with-border">
		<i class="fa fa-desktop"></i>
		<h4 class="box-title">Inbox</h4>
		
	</div>
	<div class="box-body">
<div class="table-responsive">
	<table id="datatable" class="table table-bordered box-table">
		<thead>
			<tr>
				
				<th>SL</th>
				<th>Type</th>
				<th>Date</th>
				<th>Subject</th>
				<th>File</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1; ?>
		@foreach($data as $value)

	<tr>

		<td>{{ $i++ }}</td>
		<td>@if($value->sending_type==1)
		  <i class="fa fa-mail-reply"></i>
			
		 <span class="label label-success">Inbox</span>
		  @else 
		  <i class="fa fa-mail-forward"></i>
		  <span class="label label-primary">Sent</span> 
		@endif
	</td>
		<td>{{ $value->created_at->format('Y-m-d') }}</td>
		<td>{{ $value->title }}</td>
		<td><a href="{{ url('public/supports',$value->file) }}" target="_blank">{{ $value->file }}</a></td>
		<td>
		@if($value->sending_type==2) 
		  @if($value->admin_status==1) 
		 <span class="label label-info">Seen</span>
		 @else 
         <span class="label label-danger">Unseen</span>
		 @endif
		 @else 
        @if($value->status==1) 
		 <span class="label label-success">Seen</span>
		 @else 
         <span class="label label-danger">Unseen</span>
		 @endif
		 @endif</td>
		<td>
				<form method="post" action="{{ route('support.delete') }}">
					@csrf
					<input type="hidden" name="id" value="{{ $value->id }}">
					<button class="btn btn-danger btn-xs" type="submit" onclick="return confirm('Are you sure you want to delete?');"><i class="fa fa-trash"></i></button> | <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal" onclick="loadModal('{{route('support.show',$value->id)}}')"><i class="fa fa-eye"></i></button>
				</form>	
		</td>
	</tr>
		@endforeach
		</tbody>
	</table>
	</div>
	    </div>
</div>
@endsection