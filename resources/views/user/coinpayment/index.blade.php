@extends('user.index')
@section('content')

<div class="box box-solid">
	<div class="box-header with-border">
		<i class="fa fa-plus"></i>
		<h4 class="box-title">Check Transaction</h4>
		
	</div>
	<div class="box-body">
	<form method="post" class="form-horizontal" action="{{ route('testCoinbase.check') }}">
		@csrf
		<div class="col-md-6">
		<div class="form-group">
	    <label for="amount" class="col-sm-3 col-form-label">Payment ID</label>
                                            <div class="col-sm-9">
                                                {!! Form::text('payment_id',null , ['class'=>' form-control','id'=>'amount','placeholder'=>'','required'=>true]) !!}
                                            </div>
		</div>


         <div class="form-group">
         	<div class="col-sm-3">
         	</div>
         	<div class="col-sm-9">
			<button type="submit" class="btn btn-sm btn-primary">Check</button>
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