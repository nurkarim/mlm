<script type="text/javascript">
    $(".modal-title").text("Show Message");
    // $(".modal-dialog").addClass("modal-md").removeClass('modal-lg');
</script>

<div class="col-md-12">
<p><b>Subject:</b> {{ $data->title }}</p>
<p><b>Details:</b> {{ $data->note }}</p>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-danger ripple btn-sm" data-dismiss="modal"
            data-ripple-color="rgba(236,64,122,.3)"><i class="fa fa-close"></i> Cancel
    </button>
</div>

