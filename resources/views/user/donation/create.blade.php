@extends('user.index')
@section('breadcrumb')
<h1>
   <a href="{{ url('dashboard') }}">Dashboard</a>/Donation

</h1>
@endsection
@section('content')
<div class="box box-solid">
	<div class="box-header with-border">
		<i class="fa fa-dollar"></i>
		<h4 class="box-title"> Donation</h4>
		
	</div>
	<div class="box-body">
	<form method="post" class="form-horizontal" action="{{ route('donation.post') }}">
		@csrf
		<div class="col-md-6">
		<div class="form-group">
			<label for="type" class="col-sm-3 col-form-label">Donate From</label>
		<div class="col-sm-9">
			<select class="form-control" id="gridCheck" name="type" required="">
				<option value="2">Funds Wallet</option>
				<option value="1">Stripe</option>
			</select>
		</div>
		</div>
		<div class="form-group">
	    <label for="amount" class="col-sm-3 col-form-label">Donate Amount</label>
                                            <div class="col-sm-9">
                                                {!! Form::text('amount',null , ['class'=>' form-control','id'=>'amount','placeholder'=>'','required'=>true]) !!}
                                            </div>
		</div>
		<div class="form-group">
	    <label for="note" class="col-sm-3 col-form-label">Note</label>
                                            <div class="col-sm-9">
                                                {!! Form::text('note',null , ['class'=>' form-control','id'=>'note','placeholder'=>'']) !!}
                                            </div>
		</div>
		
                                        <div class="form-group card_form">
                                            <label for="card_number" class="col-sm-3 col-form-label"> Card Number</label>
                                            <div class="col-sm-9">
                                                {!! Form::text('card_number', null, [ 'class' => 'form-control', 'data-stripe' => 'number', 'data-parsley-type' => 'number', 'maxlength' => '16', 'data-parsley-trigger' => 'change focusout', 'data-parsley-class-handler' => '#cc-group' ]) !!}

                                            </div>

                                        </div>
                                        <div class="form-group card_form">
                                            <label for="exp_date" class="col-sm-3 col-form-label"> Exp.Month</label>
                                            <div class="col-sm-4">
                                                {!! Form::selectMonth('exp_date', null, [ 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'data-stripe' => 'exp-month' ], '%m') !!}

                                            </div>
                                            <div class="col-sm-5">
                                                {!! Form::selectYear('exp_year', date('Y'), date('Y') + 10, null, [ 'class' => 'form-control', 'data-stripe' => 'exp-year', 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', ]) !!}

                                            </div>
                                        </div>
                                        <div class="form-group card_form">
                                            <label for="card_cvv" class="col-sm-3 col-form-label"> CVV</label>
                                            <div class="col-sm-9">
                                                {!! Form::text('card_cvv', null, [ 'class' => 'form-control', 'data-stripe' => 'cvc', 'data-parsley-type' => 'number', 'data-parsley-trigger' => 'change focusout', 'maxlength' => '4', 'data-parsley-class-handler' => '#ccv-group' ]) !!}

                                            </div>
                                        </div>
         <div class="form-group">
         	<div class="col-sm-3">
         	</div>
         	<div class="col-sm-9">
			<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dollar"></i> Donate Send</button>
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
<script type="text/javascript">
    $('#gridCheck').change(function() {
        if ($(this).val()==1) {
            $('.card_form').show();
        } else {
            $('.card_form').hide();
        }
    });

</script>

@endsection
@endsection