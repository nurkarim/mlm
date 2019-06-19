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
            <span class="info-box-number">{{ $total_funds }}</span>
         </div>
      </div>
   </div>
   <!-- /.col -->
   <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
         <span class="info-box-icon bg-blue-gradient"><i class="fa fa-users"></i></span>
         <div class="info-box-content">
            <span class="info-box-text">Active Members</span>
            <span class="info-box-number">{{$activeMember}}</span>
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
            <span class="info-box-number">{{$inactiveMember}}</span>
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
            <span class="info-box-number">{{ $twithdrawal }}</span>
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
         <a href="{{ route('adminUsers.updateAll') }}" onclick="return confirm('Are you sure you want to approve all users?');" class="btn btn-sm btn-info pull-right">Approved All</a>
      </div>
      <div class="box-body">
 <table id="datatable" class="table table-bordered box-table">
      <thead>
         <tr>
            <th>SL</th>
            <th>Username</th>
            <th>Referral ID</th>
            <th>Position ID</th>
            <th>Funding Wallet</th>
            <th>Action</th>
         </tr>
      </thead>
      <tbody>
         <?php $i=1; ?>
      @foreach($users as $user)
         <tr>
            <td>{{ $i++ }}</td>
            <td><a href="{{ route('members.show',$user->id) }}">{{ $user->user_name }}</a></td>
            <td><a href="{{ route('members.show',$user->refferral->id) }}">{{ $user->refferral->user_name }}</a></td>
            <td><a href="{{ route('members.show',$user->placementUser->id) }}">{{ $user->placementUser->user_name }}</a></td>
            <td>{{ $user->funds_amount }}</td>
            <td>
               <a  data-toggle="modal" data-target="#modal" onclick="loadModal('{{ route('members.action',$user->id) }}')" class="btn btn-info btn-xs" href="#">Action</a>
            </td>
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
         <i class="fa fa-desktop"></i>
         <h4 class="box-title">Withdrawal Request</h4>
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
            <th>Action</th>
         </tr>
      </thead>
      <tbody>
         <?php $i=1; ?>
      @foreach($withdrawals as $value)
         <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $value->created_at->format('Y-m-d') }}</td>
            <td>{{ $value->wallet_address }}</td>
            <td>{{ $value->amount }}</td>
            <td>{{ $value->fee }}</td>
            <td>{{ $value->total }}</td>
            <td>{{ $value->remark }}</td>
            <td>@if($value->status==1) Approved @else Pending @endif</td>
            <td><button data-toggle="modal" data-target="#modal" onclick="loadModal('{{route('withdrawals.edit',$value->id)}}')" class="btn btn-xs btn-info">Action</button></td>
         
         </tr>
      @endforeach
      </tbody>
   </table>
      </div>
   </div>
</div>
@endsection