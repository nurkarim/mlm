@extends('admin.index')
@section('content')
<div class="box box-solid">
	<div class="box-header with-border">
		<i class="fa fa-desktop"></i>
		<h4 class="box-title">Transaction History</h4>
	</div>
	<div class="box-body">
	<div class="table-responsive">
	<table class="table table-bordered box-table ajaxDataTable">
		<thead>
			<tr>
				<th>Date</th>
				<th>Username</th>
				<th>From</th>
				<th>TO</th>
				<th>Details</th>
				<th>Amount</th>
				<th>Fee</th>
				<th>Total</th>
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
      loadDataTable('{!! route('admin.transaction.ajax') !!}',[
            {data: 'date'},
            {data: 'user_name'},
            {data: 'from'},
            {data: 'to'},
            {data: 'note'},
            {data: 'amount'},
            {data: 'fee'},
            {data: 'total'}
            ]);
</script>
@endsection
@endsection
