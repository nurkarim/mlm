@extends('admin.index')
@section('content')

<div class="box box-solid">
	<div class="box-header with-border">
		<i class="fa fa-cogs"></i>
		<h4 class="box-title">Commission Settings</h4>
	</div>
	<div class="box-body form-horizental">
	<form class="" method="post" action="{{ route('commission.store') }}">
		<div class="col-md-6">
		@csrf
		<?php $i=1; $percent=0; ?>
		@for($i=1;$i<14;$i++)
		<?php
		$lebel="";
		if ($i==1) {
			$lebel='First';
		}elseif ($i==2) {
			$lebel='Second';
		}elseif ($i==3) {
			$lebel='Third';
		}elseif ($i==4) {
			$lebel='Fourth';
		}elseif ($i==5) {
			$lebel='Fifth';
		}elseif ($i==6) {
			$lebel='Six';
		}elseif ($i==7) {
			$lebel='Seven';
		}elseif ($i==8) {
			$lebel='Eight';
		}elseif ($i==9) {
			$lebel='Nine';
		}elseif ($i==10) {
			$lebel='Ten';
		}elseif ($i==11) {
			$lebel='Eleven';
		}elseif ($i==12) {
			$lebel='12';
		}elseif ($i==13) {
			$lebel='13';
		}
		if (count($collect)>0) {
			$comm=$collect->where('level_id',$i)->first();
			$percent=$comm->percent;
		}else{
			$percent=0;
		}
		?>
	 	<div class="form-group">
	 		<label>{{ $lebel }} Label</label>
	 		<input type="text" name="lebel_commission[]" class="form-control" value="{{ $percent }}">
	 		<input type="hidden" name="lebel_id[]" class="form-control" value="{{ $i }}">
	 	</div>
	 	@if($i==7)
</div>
  <div class="col-md-6">

	 	@endif
	 	@endfor
	 	</div>
	 	<div class="col-md-12">
	 		<div class="form-group">
	 			<button class="btn btn-success"><i class="fa fa-save"></i> Save</button>
	 		</div>
	 	</div>
	 </form>
	</div>
</div>

@endsection