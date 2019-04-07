<script>
  function loadModal(url){
    $("#body-content").load(url);
  }

</script>
<!-- Normal Modal -->
<div id="modal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modalCus-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" ></h4>
      </div>
      <div class="modal-body" id="body-content">
        Loading ..
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div> <!-- /.modal -->



 



