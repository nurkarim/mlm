@extends('user.index')
@section('content')
<div class="box box-solid">
	<div class="box-header">
		<div class="pull-right">
			<b>Available Funds</b> <i class="fa fa-dollar"></i>
		<h4 class="box-title">{{ Auth::user()->funds_amount }}</h4>
		
		</div>
	</div>
</div>
<div class="box box-solid">
	<div class="box-header with-border">
		<i class="fa fa-plus"></i>
		<h4 class="box-title">Funds Transfer</h4>
		
	</div>
	<div class="box-body">
	<form method="post" class="form-horizontal" action="{{ route('fundsTransfer.store') }}">
		@csrf
		<div class="col-md-6">

		<div class="form-group">
	    <label for="user_name" class="col-sm-3 col-form-label">To</label>
                                            <div class="col-sm-9">
                                                {!! Form::text('user_name',null , ['class'=>' form-control','id'=>'user_name','placeholder'=>'Enter username','required'=>true]) !!}
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
         	<div class="col-sm-3">
         	</div>
         	<div class="col-sm-9">
			<button type="submit" class="btn btn-sm btn-primary">Funds Transfer</button>
		</div>
		</div>
	</div>
    </form>
    </div>
</div>
<style type="text/css">
.card_form{display: none;}
</style>
@section('js')


@endsection
@endsection