@extends('user.index')
@section('content')
<div class="box box-solid">
	<div class="box-header with-border">
		<i class="fa fa-desktop"></i>
		<h4 class="box-title">Ebooks</h4>
	</div>
	<div class="box-body">
	<div class="table-responsive">
	<table id="datatable" class="table table-bordered box-table">
		<thead>
			<tr>
				<th>SL</th>
				<th>Cover</th>
				<th>Title</th>
				<th>Download</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1; ?>
		@foreach($ebooks as $ebook)
			<tr>
				<td>{{ $i++ }}</td>
				<td><img src="{{ url('public/ebooks',$ebook->cover_image) }}" style="height: 50px" class="img-thumbnail"></td>
				<td>{{ $ebook->title }}</td>
				<td><a href="{{ url('public/ebooks/files',$ebook->pdf) }}" target="_blank" class="btn btn-xs btn-primary">Download</a></td>
				
			</tr>
		@endforeach
		</tbody>
	</table>
	</div>
    </div>
</div>


@endsection