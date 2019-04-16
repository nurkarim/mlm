@extends('user.index')
@section('content')
<div class="box box-solid">
	<div class="box-header with-border">
		<i class="fa fa-desktop"></i>
		<h4 class="box-title">Earning Commission History</h4>
		
	</div>
	<div class="box-body">
	<div class="table-responsive">
	<table id="datatable" class="table table-bordered box-table">
		<thead>
			<tr>
				<th>SL</th>
				<th>Date</th>
				<th>From</th>
				<th>Amount</th>
				<th>Level</th>
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
				<td>
				@if($value->level==1)
				 First  Level
				 @elseif($value->level==2) 
				 Second  Level
				  @elseif($value->level==3) 
				 Third  Level
				  @elseif($value->level==4) 
				 Fourth  Level
				  @elseif($value->level==5) 
				 Fifth  Level
				  @elseif($value->level==6) 
				 Sixth  Level
				  @elseif($value->level==7) 
				 Seventh Level 
				  @elseif($value->level==8) 
				 Eighth  Level
				  @elseif($value->level==9) 
				 Ninth  Level
				  @elseif($value->level==10) 
				 Tenth  Level
				  @elseif($value->level==11) 
				 Eleventh  Level
				  @elseif($value->level==12) 
				 Twelfth  Level
				  @elseif($value->level==13) 
				 Thirteenth  Level
				@endif</td>
			
			</tr>
		@endforeach
		</tbody>
	</table>
	</div>
    </div>
</div>
@endsection