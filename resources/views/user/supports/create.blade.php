@extends('user.index')
@section('content')
<div class="box box-solid">
	<div class="box-header with-border">
		<i class="fa fa-plus"></i>
		<h4 class="box-title">Compose</h4>
		
	</div>
	<div class="box-body">
	<form method="post" enctype="multipart/form-data" class="form-horizontal" action="{{ route('support.store') }}">
		@csrf
		<div class="col-md-8">

		<div class="form-group">
	    <label for="subject" class="col-sm-3 col-form-label">Subject</label>
                                            <div class="col-sm-9">
                                                {!! Form::text('subject',null , ['class'=>' form-control','id'=>'subject','placeholder'=>'Enter subject','required'=>true]) !!}
        </div>
		</div>
		<div class="form-group">
	    <label for="note" class="col-sm-3 col-form-label">Details</label>
                                            <div class="col-sm-9">
                                                {!! Form::textarea('note',null , ['class'=>' form-control','id'=>'note','placeholder'=>'','required'=>true]) !!}
                                            </div>
		</div>
		<div class="form-group">
	    <label for="image" class="col-sm-3 col-form-label">Attachment</label>
           <div class="col-sm-9">
                                                {!! Form::file('image',null , ['class'=>' form-control','id'=>'image','placeholder'=>'']) !!}
          </div>
		</div>


         <div class="form-group">
         	<div class="col-sm-3">
         	</div>
         	<div class="col-sm-9">
			<button type="submit" class="btn btn-sm btn-primary">Send</button>
		</div>
		</div>
	</div>
    </form>
    </div>
</div>

<style type="text/css">
.card_form{display: none;}
</style>
@section('js')


@endsection
@endsection