<?php 
$get_id = core_decrypt(filter_input(INPUT_GET, 'id'));

?>
<script type="text/javascript">
  var WEBSITE = "<?php echo WEBSITE; ?>";
</script>
<script type="text/javascript" src="<?php echo WEBSITE . 'js/admin/edit_document_modal.js'; ?>"></script>

<div class="modal-header panel-heading">
    <h4 class="modal-title"><b>Edit Document</b></h4>
    <button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign"></span></button>
    
</div>

<div class="modal-body">
  <?php
    $document_details = "SELECT * FROM ".document_type." WHERE id='".$get_id."'";
    $document_details_res = mysqli_query($conn,$document_details) or die(mysqli_error($conn));
    $document_details_row = mysqli_fetch_assoc($document_details_res);
  ?>
  <form method="POST" id="editForm" name="editForm">

  <input type="hidden" name="documentId" id="documentid" value="<?php echo core_encrypt($get_id); ?>">
  <label> Document Name : </label>
  <input type="text" name="documentName" class="form-control" value="<?php echo $document_details_row['name']; ?>">
  </br> 
  <label> Status : </label>
  <input type="radio" name="documentStatus" value="Y" <?php echo ($document_details_row['status'] == "Y") ? 'checked' : '' ; ?> > Active </label>
  <input type="radio" name="documentStatus" value="N" <?php echo ($document_details_row['status'] == "N") ? 'checked' : '' ; ?> > Inactive </label>
  </br>
  <input type="button" name="submitEdit" id="submitEdit" value="Update" class="btn btn-danger">
  <input type="button" value="Cancel" data-dismiss="modal" class="btn btn-danger">
</form>
</div>