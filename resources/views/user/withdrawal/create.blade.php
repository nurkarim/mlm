@extends('user.index')
@section('content')
<div class="box box-solid">
	<div class="box-header">
		<div class="pull-right">
			<b>Available Withdrawal Wallet</b> <i class="fa fa-dollar"></i>
		<h4 class="box-title">{{ Auth::user()->wallet_amount }}</h4>
		
		</div>
	</div>
</div>
<div class="box box-solid">
	<div class="box-header with-border">
		<i class="fa fa-plus"></i>
		<h4 class="box-title">Withdrawal</h4>
		
	</div>
	<div class="box-body">
	<form method="post" class="form-horizontal" action="{{ route('withdrawals.store') }}">
		@csrf
		<div class="col-md-6">

		<div class="form-group">
	    <label for="wallet_address" class="col-sm-3 col-form-label">Wallet Address</label>
                                            <div class="col-sm-9">
                                                {!! Form::text('wallet_address',null , ['class'=>' form-control','id'=>'wallet_address','placeholder'=>'Enter bitcoin address','required'=>true]) !!}
        </div>
		</div>
		<div class="form-group">
	    <label for="amount" class="col-sm-3 col-form-label">Amount</label>
                                            <div class="col-sm-9">
                                                {!! Form::text('amount',null , ['class'=>' form-control','id'=>'amount','placeholder'=>'Transfer amount','required'=>true]) !!}
                                            </div>
		</div>
		<div class="form-group">
	    <label for="note" class="col-sm-3 col-form-label">Remark</label>
           <div class="col-sm-9">
                                                {!! Form::text('note',null , ['class'=>' form-control','id'=>'note','placeholder'=>'Write sort remark']) !!}
          </div>
		</div>
		<div class="form-group">
	    <label for="note" class="col-sm-3 col-form-label"></label>
           <div class="col-sm-9">
                                                {!! Form::checkbox('check',1 , ['class'=>'form-control','id'=>'check','required'=>true]) !!} I agree to withdrawal
          </div>
		</div>

         <div class="form-group">
         	<div class="col-sm-3">
         	</div>
         	<div class="col-sm-9">
			<button type="submit" class="btn btn-sm btn-primary">Confirm</button>
		</div>
		</div>
	</div>
    </form>
    </div>
</div>
<b>Note:</b><br>
<li>Provide your valid bitcoin address</li>
<li>Minimum withdrawal request is USD $5.00</li>
<li>Processing time is at least 3-5 days</li>
<li>Withdraw fee is 10% on the withdraw amount or USD $0.50 whichever is higher</li>
<li>Withdrawal will be calculated every month from 1st to 7th. Payment will be on the  10th of each month (Additional business day needed should there be any Public Holiday)</li>
<style type="text/css">
.card_form{display: none;}
</style>
@section('js')


@endsection
@endsection