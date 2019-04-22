@extends('user.index')
@section('breadcrumb')
<h1>
   Dashboard
   <small style="font-weight: bold;color: black">(Hello,{{ Auth::user()->name }})</small>
</h1>
@endsection
@section('content')
<div class="row">
   <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
         <span class="info-box-icon bg-aqua-gradient"><i class="fa fa-bank"></i></span>
         <div class="info-box-content">
            <span class="info-box-text">Funds</span>
            <span class="info-box-number">{{ Auth::user()->funds_amount }}</span>
         </div>
      </div>
   </div>
   <!-- /.col -->
   <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
         <span class="info-box-icon bg-blue-gradient"><i class="fa fa-users"></i></span>
         <div class="info-box-content">
            <span class="info-box-text">Total Referral</span>
            <span class="info-box-number">{{ count(Auth::user()->referralUser) }}</span>
         </div>
      </div>
   </div>
   <!-- /.col -->
   <!-- fix for small devices only -->
   <div class="clearfix visible-sm-block"></div>
   <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
         <span class="info-box-icon bg-purple-gradient"><i class="fa fa-dollar"></i></span>
         <div class="info-box-content">
            <span class="info-box-text">Total Earning</span>
            <span class="info-box-number">{{ $sumComission }}</span>
         </div>
         <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
   </div>
   <!-- /.col -->
   <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
         <span class="info-box-icon bg-maroon-gradient"><i class="fa fa-dollar"></i></span>
         <div class="info-box-content">
            <span class="info-box-text">Available Wallet</span>
            <span class="info-box-number">{{ Auth::user()->wallet_amount }}</span>
         </div>
         <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
   </div>
   <!-- /.col -->
</div>
<div class="">
   <div class="box box-solid">
      <div class="box-header with-border">
         <i class="fa fa-dollar"></i>
         <h4 class="box-title">Funding History</h4>
      </div>
      <div class="box-body">
         <table  class="table table-bordered box-table">
      <thead>
         <tr>
            <th>SL</th>
            <th>From Wallet</th>
            <th>Amount</th>
            <th>Status</th>
         </tr>
      </thead>
      <tbody>
         <?php $i=1; ?>
      @foreach($funds as $fund)
         <tr>
            <td>{{ $i++ }}</td>
            <td>@if($fund->type==1) Stripe @else Coinpayment @endif</td>
            <td>{{ $fund->amount }}</td>
            <td>Approved</td>
         
         </tr>
      @endforeach
      </tbody>
   </table>
      </div>
   </div>
</div>

<div class="">
   <div class="box box-solid">
      <div class="box-header with-border">
         <i class="fa fa-dollar"></i>
         <h4 class="box-title">Withdrawal History</h4>
      </div>
      <div class="box-body">
       <table  class="table table-bordered box-table">
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
      @foreach($data as $value)
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
</div>

@endsection