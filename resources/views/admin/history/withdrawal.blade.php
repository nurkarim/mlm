@extends('admin.index')
@section('content')
<div class="box box-solid">
	<div class="box-header with-border">
		<i class="fa fa-desktop"></i>
		<h4 class="box-title">Withdrawal History</h4>
	</div>
	<div class="box-body">
	<div class="table-responsive">
	<table class="table table-bordered box-table ajaxDataTable">
		<thead>
			<tr>
				<th>Date</th>
				<th>Username</th>
				<th>Wallet Address</th>
				<th>Details</th>
				<th>Amount</th>
				<th>Fee</th>
				<th>Total</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			
		</tbody>
	</table>
	</div>
    </div>
</div>

@section('js')
<script type="text/javascript">
      loadDataTable('{!! route('admin.withdrawalAjax') !!}',[
            {data: 'date'},
            {data: 'user_name'},
            {data: 'wallet_address'},
            {data: 'remark'},
            {data: 'amount'},
            {data: 'fee'},
            {data: 'total'},
            {data: 'statusW'}
            ]);
</script>
@endsection
@endsection
