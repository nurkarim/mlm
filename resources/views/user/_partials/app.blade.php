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
            <span class="info-box-text">Total Funds</span>
            <span class="info-box-number">0</span>
         </div>
      </div>
   </div>
   <!-- /.col -->
   <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
         <span class="info-box-icon bg-blue-gradient"><i class="fa fa-users"></i></span>
         <div class="info-box-content">
            <span class="info-box-text">Direct position</span>
            <span class="info-box-number">0</span>
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
            <span class="info-box-number">0</span>
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
            <span class="info-box-number">0</span>
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
         <table class="table table-bordered box-table">
            <thead>
               <tr>
                  <th>SL</th>
                  <th>Date</th>
                  <th>Type</th>
                  <th>Funding Amount</th>
                  <th>Status</th>
               
               </tr>
            <thead>
            <tbody>
            <tbody>
         </table>
      </div>
   </div>
</div>

@endsection