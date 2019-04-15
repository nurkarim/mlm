@extends('admin.index')
@section('content')
<div class="box box-solid">
	<div class="box-header with-border">
		<i class="fa fa-desktop"></i>
		<h4 class="box-title">Ebook List</h4>
		<a href="#" class="pull-right btn btn-xs btn-primary" data-toggle="modal" data-target="#modal" onclick="loadModal('{{route('ebooks.create')}}')"><i class="fa fa-plus"></i> Add New </a>
	</div>
	<div class="box-body">
	<div class="table-responsive">
	<table id="datatable" class="table table-bordered box-table">
		<thead>
			<tr>
				<th>SL</th>
				<th>Title</th>
				<th>Cover</th>
				<th>File</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1; ?>
		@foreach($ebooks as $ebook)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{ $ebook->title }}</td>
				<td><img src="{{ url('public/ebooks',$ebook->cover_image) }}" style="height: 40px" class="img-thumbnail"></td>
				<td><a href="{{ url('public/ebooks/files',$ebook->pdf) }}" target="_blank" class="btn btn-xs btn-primary">Download</a></td>
				<td>
				<form method="post" action="{{ route('ebooks.delete') }}">
					@csrf
					<input type="hidden" name="id" value="{{ $ebook->id }}">
					<button class="btn btn-danger btn-xs" type="submit" onclick="return confirm('Are you sure you want to delete?');"><i class="fa fa-trash"></i></button> | <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal" onclick="loadModal('{{route('ebooks.edit',$ebook->id)}}')"><i class="fa fa-edit"></i></button>
				</form>	

				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
	</div>
    </div>
</div>


@endsection