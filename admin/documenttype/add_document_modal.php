<script type="text/javascript">
  var WEBSITE = "<?php echo WEBSITE; ?>";
</script>
<script type="text/javascript" src="<?php echo WEBSITE . 'js/admin/add_document_modal.js'; ?>"></script>

<div class="modal-header panel-heading">
    <h4 class="modal-title"><b>Add Document Type</b></h4>
    <button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign"></span></button>
    
</div>

<div class="modal-body">
  <form method="POST" id="addForm" name="addForm">
    <label> Document Name : </label>
    <input type="text" name="documentName" class="form-control" required pattern="[A-Za-z0-9]+" maxlength="50" title="Max 50 Character and Numbers allowed!">
    </br> 
    <label> Status : </label>
    <input type="radio" name="documentStatus" value="Y" required> Active </label>
    <input type="radio" name="documentStatus" value="N" required> Inactive </label>
    </br>
    <input type="submit" name="submitAdd" id="submitAdd" value="Add" class="btn btn-danger">
    <input type="button" value="Cancel" data-dismiss="modal" class="btn btn-danger">
  </form>
</div>