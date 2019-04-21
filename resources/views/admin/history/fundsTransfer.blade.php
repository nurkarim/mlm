@extends('admin.index')
@section('content')
<div class="box box-solid">
	<div class="box-header with-border">
		<i class="fa fa-desktop"></i>
		<h4 class="box-title">Funds Transfer History</h4>
	</div>
	<div class="box-body">
	<div class="table-responsive">
	<table class="table table-bordered box-table ajaxDataTable">
		<thead>
			<tr>
				<th>Date</th>
				<th>From</th>
				<th>To</th>
				<th>Amount</th>
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
      loadDataTable('{!! route('admin.fundsTransferAjax') !!}',[
            {data: 'date'},
            {data: 'from'},
            {data: 'to'},
            {data: 'amount'},
            {data: 'statusW'}
            ]);
</script>
@endsection
@endsection
