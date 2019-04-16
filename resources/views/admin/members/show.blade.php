@extends('admin.index')
@section('content')
<style type="text/css">
.profile li{
 line-height: 30px;
}
.profile span{
 padding: 5px;
}
.margin-top-10{
	margin-top: 10px;
}
</style>
<div class="box box-default">
	<div class="box-header with-border">
		<i class="fa fa-desktop"></i>
		<h4 class="box-title">Member Details</h4>
		
	</div>
	<div class="box-body">
		<div class="row">
	<div class="col-md-2">
	@if(file_exists(url('public/users',$user->image)))
	<img src="{{ url('public/users',$user->image) }}" class="img-responsive img-thumbnail" style="max-height: 150px;">	
	@else

	<img src="{{ url('public/icons/profile.png') }}" class="img-responsive img-thumbnail" style="max-height: 150px;">	
	@endif
	</div>
	<div class="col-md-5 col-xs-12 col-sm-6">
	<ul class="profile">
		<li><b>Name</b> <span>:</span> <span> {{ $user->name }}</span></li>
		<li><b>UserName</b> <span>:</span> <span> {{ $user->user_name }}</span></li>
		<li><b>Email</b> <span>:</span> <span> {{ $user->email }}</span></li>
		<li><b>Phone</b> <span>:</span> <span> {{ $user->phone }}</span></li>
		<li><b>Referral</b> <span>:</span> <span> {{ $user->refferral->user_name }}</span></li>
		<li><b>Position</b> <span>:</span> <span> {{ $user->placementUser->user_name }}</span></li>
		<li><b>Status</b> <span>:</span> <span> @if($user->status==1) <label class="label label-success">Active</label> @else <label class="label label-danger">Inactive</label> @endif</span></li>
		<li><b>Email Verify</b> <span>:</span> <span> @if($user->email_verified==1) <label class="label label-success">True</label> @else <label class="label label-danger">False</label> @endif</span></li>
	</ul>	
	</div>
	<div class="col-md-5 col-sm-6 col-xs-12">
	<ul class="profile">
		<li><b>Available Funds</b> <span>:</span> <span> {{ $user->funds_amount }}</span></li>
		<li><b>Available Wallet</b> <span>:</span> <span> {{ $user->wallet_amount }}</span></li>
		<li><b>Withdrawal Amount</b> <span>:</span> <span> 0 </span></li>
	
	</ul>	
	</div>
	</div>
	<div class="">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Profile</a></li>
              <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Transaction History</a></li>
              <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Funding History</a></li>
              <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false">Withdrawal History</a></li>
              <li class=""><a href="#tab_5" data-toggle="tab" aria-expanded="false">Referral Members</a></li>
              <li class=""><a href="#tab_6" data-toggle="tab" aria-expanded="false">Commission History</a></li>
              <li class=""><a href="#tab_7" data-toggle="tab" aria-expanded="true">Discounts</a></li>
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">

               	<div class="form-group">
               		<label>Name</label>
               		<input type="text" readonly="" class="form-control" value="{{ $user->name }}">
               	</div>
               <div class="form-group">
               		<label>Email</label>
               		<input type="text" readonly="" class="form-control" value="{{ $user->email }}">
               	</div>
	          <div class="form-group">
               		<label>Phone</label>
               		<input type="text" readonly="" class="form-control" value="{{ $user->phone }}">
               	</div>
               	<div class="form-group">
               		<label>City</label>
               		<input type="text" readonly="" class="form-control" value="{{ $user->city }}">
               	</div>
               	<div class="form-group">
               		<label>Country</label>
               		<input type="text" readonly="" class="form-control" value="{{ $user->country }}">
               	</div>
               	<div class="form-group">
               		<label>Address</label>
               		<input type="text" readonly="" class="form-control" value="{{ $user->address }}">
               	</div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
     <div class="table-responsive">
	<table id="datatable" class="table table-bordered box-table">
		<thead>
			<tr>
	
				<th>ID No</th>
				<th>From</th>
				<th>To</th>
				<th>Note</th>
				<th>Amount</th>
				<th>Fee</th>
				<th>Total</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>

		@foreach($user->transactions as $transection)
			<tr>
				<td>#{{ $transection->id }}</td>
				<td>{{ $transection->from }}</td>
				<td>{{ $transection->to }}</td>
				<td>{{ $transection->note }}</td>
				<td>@if($transection->type==5) <span style="color: red">-</span>@endif{{ $transection->amount }}</td>
				<td>{{ $transection->fee }}</td>
				<td>@if($transection->type==5) <span style="color: red">-</span>@endif{{ $transection->total }}</td>
				<td>
					@if($transection->status==1)
					<label class="label label-primary">Approved</label>
					@else
	                <label class="label label-danger">Pending</label>
					@endif
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
	</div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                
                  <div class="table-responsive">
	<table  class="table table-bordered box-table datatable">
		<thead>
			<tr>
	
				<th>ID No</th>
				<th>Wallet Type</th>
				<th>Details</th>
				<th>Funding Amount</th>
				<th>Wallet Fee</th>
				<th>Total Funding Amount</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>

		@foreach($user->fundingHistory as $funds)
			<tr>
				<td>#{{ $funds->id }}</td>
				<td>@if($funds->type==1)
					<label class="label label-primary">Stripe</label>
					@else
	                <label class="label label-info">Coinpayment</label>
					@endif</td>
			    <td>
			    	@if($funds->type==1)
					{{ $funds->strip_charge_id }}
					@else
	                
					@endif
				</td>
			    <td>{{ $funds->amount }}</td>
			    <td>{{ $funds->fee }}</td>
			    <td>{{ $funds->total }}</td>
			    <td>@if($funds->status==1)
					<label class="label label-primary">Active</label>
					@else
	                <label class="label label-danger">Pending</label>
					@endif</td>
				
			</tr>
		@endforeach
		</tbody>
	</table>
	</div>
              </div>     
            
              <div class="tab-pane" id="tab_7">
                <div class="table-responsive">
	<table id="" class="table table-bordered box-table datatable">
		<thead>
			<tr>
				<th>SL</th>
				<th>Code</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1; ?>
		@foreach($user->discounts as $discount)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{ $discount->code }}</td>
				<td>
					@if($discount->status==1)
					<label class="label label-primary">Used</label>
					@else
	                <label class="label label-danger">Unused</label>
					@endif
				</td>
				
			</tr>
		@endforeach
		</tbody>
	</table>
	</div>
              </div>   
              <div class="tab-pane" id="tab_5">
                
                <div class="table-responsive">
	<table id="" class="table table-bordered box-table datatable">
		<thead>
			<tr>
				<th>SL</th>
				<th>User-name</th>
				<th>Position ID</th>
				<th>Funding Wallet</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1; ?>
		@foreach($user->referralMember as $user)
			<tr>
				<td>{{ $i++ }}</td>
				<td><a href="{{ route('members.show',$user->id) }}">{{ $user->user_name }}</a></td>
				<td><a href="{{ route('members.show',$user->placement_id) }}">{{ $user->placementUser->user_name }}</a></td>
				<td>{{ $user->funds_amount }}</td>
				<td>
					@if($user->status==1)
					<label class="label label-success">Active</label>
					@else
					<label class="label label-danger">Inactive</label>
					@endif
				</td>
				
			</tr>
		@endforeach
		</tbody>
	</table>
	</div>
              </div>

              <div class="tab-pane" id="tab_4">
                
                <div class="table-responsive">
	<table id="" class="table table-bordered box-table datatable">
		<thead>
			<tr>
				<th>SL</th>
				<th>Date</th>
				<th>Wallet Address</th>
				<th>Amount</th>
				<th>Fee</th>
				<th>Total</th>
				<th>Remark</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1; ?>
		@foreach($user->withdrawals as $value)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{ $value->created_at->format('Y-m-d') }}</td>
				<td>{{ $value->wallet_address }}</td>
				<td>{{ $value->amount }}</td>
				<td>{{ $value->fee }}</td>
				<td>{{ $value->total }}</td>
				<td>{{ $value->remark }}</td>
				<td>@if($value->status==1) Approved @else Pending @endif</td>
			
			</tr>
		@endforeach
		</tbody>
	</table>
	</div>
              </div>

              <div class="tab-pane" id="tab_6">
                
                <div class="table-responsive">

	<table id="" class="table table-bordered box-table datatable">
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
		@foreach($commissions as $valueCom)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{ $valueCom->created_at->format('Y-m-d') }}</td>
				<td>{{ $valueCom->user->user_name }}</td>
				<td>{{ $valueCom->amount }}</td>
				<td>
				@if($valueCom->level==1)
				 First  Level
				 @elseif($valueCom->level==2) 
				 Second  Level
				  @elseif($valueCom->level==3) 
				 Third  Level
				  @elseif($valueCom->level==4) 
				 Fourth  Level
				  @elseif($valueCom->level==5) 
				 Fifth  Level
				  @elseif($valueCom->level==6) 
				 Sixth  Level
				  @elseif($valueCom->level==7) 
				 Seventh Level 
				  @elseif($valueCom->level==8) 
				 Eighth  Level
				  @elseif($valueCom->level==9) 
				 Ninth  Level
				  @elseif($valueCom->level==10) 
				 Tenth  Level
				  @elseif($valueCom->level==11) 
				 Eleventh  Level
				  @elseif($valueCom->level==12) 
				 Twelfth  Level
				  @elseif($valueCom->level==13) 
				 Thirteenth  Level
				@endif</td>
			
			</tr>
		@endforeach
		</tbody>
	</table>
	</div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
	
	</div>

</div>
@section('subUrl')
    <script>url= "{{ route('members.index') }}"</script>
@endsection


@endsection