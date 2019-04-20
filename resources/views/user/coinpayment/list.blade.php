@extends('user.index')
@section('content')
<style type="text/css">
	#datatable li{list-style: none;}
	.coin_amount{font-size: 20px;font-weight: bold;}
	.payment_details tbody tr td{font-size: 16px;}
	.text-danger{font-size: 16px;}
	.text-muted {font-size: 15px}
</style>
<div class="box box-solid">
	<div class="box-header with-border">
		<i class="fa fa-desktop"></i>
		<h4 class="box-title">Coinpayment List</h4>
		
	</div>
	<div class="box-body">
	<div class="table-responsive">
	<table id="datatable" class="table table-bordered box-table">
		<thead>
			<tr>
				<th>QR</th>
				<th>Details</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1; ?>
		@foreach($data as $value)
		<tr>
			<td>
				<img src="{{ $value->qrcode_url }}">

			</td>

			<td>
				<div class="media-body">
				 <h5 title="Payment ID" class="mt-0 mb-1 coin_amount">{{ $value->amount }} {{ $value->coin }}</h5> 
				 <small class="text-muted">{{ date("M d,Y H:m A", strtotime($value->payment_created_at)) }}  | {{ $value->status_text }}</small> 
				 <table class="payment_details">
				 	<tbody>
				 		<tr>
				 			<td><small><b>Payment ID</b></small></td>
				 			 <td><small>: #{{ $value->payment_id }}</small></td>
				 			</tr> 
				 			<tr>
				 				<td><b>Address</b></td> 
				 				<td>: {{ $value->payment_address }}</td>
				 			</tr>
				 			<tr>
				 				<td><b>Funds Request</b></td> 
				 				<td>: ${{ number_format($value->usd_amount,2) }}</td>
				 			</tr>
				 			</tbody>
				 		</table>
				 		 <div >
				 		 	<small class="text-muted">Expired date: {{ date("M d,Y H:m A", strtotime($value->expired)) }} | Confirmation at: @if($value->confirmation_at!=null){{ date("M d,Y H:m A", strtotime($value->confirmation_at)) }}@endif</small>
				 		 </div>
				 		  <small class="text-danger">Do not send value to us if address status is expired!</small>
				 		</div>
				<div class="btn-group">
                  <button type="button" class="btn btn-default"><i class="fa fa-cog"></i></button>
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ $value->status_url }}" target="_blank">Alternative Link</a></li>
                    <li><a href="#">Manual Check</a></li>
              
                  </ul>
                </div>
			</td>
		</tr>
		@endforeach
		</tbody>
	</table>
	</div>
    </div>
</div>
@endsection