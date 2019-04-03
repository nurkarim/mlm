<script type="text/javascript">
    $(".modal-title").text("Add Ebook");
    // $(".modal-dialog").addClass("modal-md").removeClass('modal-lg');
</script>
{!! Form::open(['route'=>'ebooks.store','id'=>'myForm','files'=>'true']) !!}
<div class="col-md-12">

        <div class="row">
        <div class="form-group">
        <label>Title</label>
         <input class="form-control" required name="name" type="text" />
        </div>
  <div class="form-group">
        <label>Cover Image(Image must be 300X300)</label>
         <input class="form-control" required name="cover" type="file" />
        </div>
       
    <div class="form-group">
        <label>File(PDF,DOCS)</label>
         <input class="form-control" required name="pdf_file" type="file" />
        </div>

        </div>


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
