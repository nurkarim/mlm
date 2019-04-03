@extends('admin.index')
@section('breadcrumb')
<h1>
   Dashboard
   <small>Summary reports</small>
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
            <span class="info-box-text">Active Members</span>
            <span class="info-box-number">0</span>
         </div>
      </div>
   </div>
   <!-- /.col -->
   <!-- fix for small devices only -->
   <div class="clearfix visible-sm-block"></div>
   <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
         <span class="info-box-icon bg-purple-gradient"><i class="fa fa-users"></i></span>
         <div class="info-box-content">
            <span class="info-box-text">Inactive Members</span>
            <span class="info-box-number">0</span>
         </div>
         <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
   </div>
   <!-- /.col -->
   <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
         <span class="info-box-icon bg-maroon-gradient"><i class="fa fa-money"></i></span>
         <div class="info-box-content">
            <span class="info-box-text">Total Withdrawal</span>
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
         <i class="fa fa-users"></i>
         <h4 class="box-title">Inactive Members</h4>
      </div>
      <div class="box-body">
         <table class="table table-bordered box-table">
            <thead>
               <tr>
                  <th>SL</th>
                  <th>Join Date</th>
                  <th>UserName</th>
                  <th>Referral By</th>
                  <th>Postion By</th>
                  <th>Action</th>
               </tr>
            <thead>
            <tbody>
            <tbody>
         </table>
      </div>
   </div>
</div>
<div class="">
   <div class="box box-solid">
      <div class="box-header with-border">
         <i class="fa fa-desktop"></i>
         <h4 class="box-title">Withdrawal Request</h4>
      </div>
      <div class="box-body">
         <table class="table table-bordered box-table">
            <thead>
               <tr>
                  <th>SL</th>
                  <th>UserName</th>
                  <th>Wallet</th>
                  <th>Amount Info</th>
                  <th>Date</th>
                  <th>Action</th>
               </tr>
            <thead>
            <tbody>
            <tbody>
         </table>
      </div>
   </div>
</div>
@endsection