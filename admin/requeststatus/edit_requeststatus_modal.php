<?php 
$get_id = core_decrypt(filter_input(INPUT_GET, 'id'));

?>
<script type="text/javascript">
  var WEBSITE = "<?php echo WEBSITE; ?>";
</script>
<script type="text/javascript" src="<?php echo WEBSITE . 'js/admin/edit_requeststatus_modal.js'; ?>"></script>

<div class="modal-header panel-heading">
    <h4 class="modal-title"><b>Edit Request Status</b></h4>
    <button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign"></span></button>
    
</div>

<div class="modal-body">
  <?php
    $requeststatus_details = "SELECT * FROM ".request_status." WHERE id='".$get_id."'";
    $requeststatus_details_res = mysqli_query($conn,$requeststatus_details) or die(mysqli_error($conn));
    $requeststatus_details_row = mysqli_fetch_assoc($requeststatus_details_res);
  ?>
  <form method="POST" id="editForm" name="editForm">

  <input type="hidden" name="requeststatusId" id="requeststatusid" value="<?php echo core_encrypt($get_id); ?>">
  <label> Request Status Name : </label>
  <input type="text" name="requeststatusName" class="form-control" value="<?php echo $requeststatus_details_row['name']; ?>" required pattern="[A-Za-z0-9]+" maxlength="50" title="Max 50 Character and Numbers allowed!">
  </br> 
  <label> Status : </label>
  <input type="radio" name="requeststatusStatus" value="Y" required <?php echo ($requeststatus_details_row['status'] == "Y") ? 'checked' : '' ; ?> > Active </label>
  <input type="radio" name="requeststatusStatus" value="N" required <?php echo ($requeststatus_details_row['status'] == "N") ? 'checked' : '' ; ?> > Inactive </label>
  </br>
  <input type="submit" name="submitEdit" id="submitEdit" value="Update" class="btn btn-danger">
  <input type="button" value="Cancel" data-dismiss="modal" class="btn btn-danger">
</form>
</div>