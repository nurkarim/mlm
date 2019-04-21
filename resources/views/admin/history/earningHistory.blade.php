@extends('admin.index')
@section('content')
<div class="box box-solid">
	<div class="box-header with-border">
		<i class="fa fa-desktop"></i>
		<h4 class="box-title">Commission History</h4>
	</div>
	<div class="box-body">
	<div class="table-responsive">
	<table class="table table-bordered box-table ajaxDataTable">
		<thead>
			<tr>
				<th>Date</th>
				<th>Username</th>
				<th>Level</th>
				<th>From</th>
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
      loadDataTable('{!! route('admin.earningHistoryAjax') !!}',[
            {data: 'date'},
            {data: 'user_name'},
            {data: 'levelName'},
            {data: 'from'},
            {data: 'amount'},
            {data: 'statusW'}
            ]);
</script>
@endsection
@endsection
