<script type="text/javascript">
    $(".modal-title").text("Buying A Position");
    // $(".modal-dialog").addClass("modal-md").removeClass('modal-lg');
</script>
{!! Form::open(['route'=>'addMatrix4x3.store','id'=>'myForm','files'=>'true']) !!}
<div class="col-md-12">

        <div class="row">
        <div class="form-group">
        <label>Referral Username</label>
         <input class="form-control" readonly="" value="{{ $user->user_name }}" required name="referral_name" type="text" />
        </div>
       <div class="form-group">
        <label>Buying Username</label>
         <input class="form-control" required name="user_name" type="text" />
         <span>Please provide a valid username,who have joined with Infinite-Funds</span>
        </div>
       


        </div>


</div>
<div class="modal-footer">
    <button type="button" class="btn btn-danger ripple btn-md" data-dismiss="modal"
            data-ripple-color="rgba(236,64,122,.3)"><i class="fa fa-close"></i> Cancel
    </button>
    <button type="submit" class="btn btn-success dp0 btn-md ripple"><i class="fa fa-save"></i> Buying ($5)</button>
</div>
{!! Form::close() !!}
<script>

</script>