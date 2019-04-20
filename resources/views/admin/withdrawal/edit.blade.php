<script type="text/javascript">
    $(".modal-title").text("Action Withdrawal");
    // $(".modal-dialog").addClass("modal-md").removeClass('modal-lg');
</script>
{!! Form::model($withdrawal,['route'=>['withdrawals.update',$withdrawal->id],'id'=>'myForm','novalidate'=>'','method'=>'PUT','files'=>'true']) !!}

        <div class="form-group">
         <label>Status</label>
         <select class="form-control" name="status">
         	<option value="1">Approved</option>
         	<option value="2">Cancel</option>
         </select>
        </div>



<div class="modal-footer">
    <button type="button" class="btn btn-danger ripple btn-sm" data-dismiss="modal"
            data-ripple-color="rgba(236,64,122,.3)"><i class="fa fa-close"></i> Cancel
    </button>
    <button type="submit" class="btn btn-primary dp0 btn-sm ripple"><i class="fa fa-save"></i> Update </button>
</div>
{!! Form::close() !!}
<script>

</script>
