@extends('user.index')
@section('breadcrumb')
<h1>
   Dashboard
   <small style="font-weight: bold;color: black">Additional Matrix (4x3)</small>
</h1>
@endsection
@section('content')
<style type="text/css">
  .m-t-10{
    margin-top: 10px;
  }
</style>
<div class="box box-solid">
  <div class="box-header with-border">
    <i class="fa fa-desktop"></i>
    <h4 class="box-title text-bold">Additional Matrix</h4>
  </div>
  <div class="box-body">
  <div class="col-md-12 m-t-10">
  <a href="{{ route('additionalMatrix.4x3') }}" class="btn btn-info col-md-6">4 x 3</a>
</div>
<div class="col-md-12 m-t-10">
  <a href="#" class="btn btn-success col-md-6">4 x 7</a>
  </div>
</div>
</div>
@endsection

