<script type="text/javascript">
    $(".modal-title").text("Action");
     $(".modal-dialog").addClass("modal-md").removeClass('modal-lg');
</script>
{!! Form::open(['route'=>'members.update','id'=>'myForm','files'=>'true']) !!}
        <div class="form-group">
        <label>Title</label>
         <select class="form-control" name="status">
         	<option value="1">Approved</option>
         </select>
         <input type="hidden" name="id" value="{{ $user->id }}">
        </div>

<div class="modal-footer">
    <button type="button" class="btn btn-danger ripple btn-sm" data-dismiss="modal"
            data-ripple-color="rgba(236,64,122,.3)"><i class="fa fa-close"></i> Cancel
    </button>
    <button type="submit" class="btn btn-primary dp0 btn-sm ripple"><i class="fa fa-save"></i> Save</button>
</div>

{!! Form::close() !!}
<script>

</script>
