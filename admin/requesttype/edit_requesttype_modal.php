<?php 
$get_id = core_decrypt(filter_input(INPUT_GET, 'id'));

?>
<script type="text/javascript">
  var WEBSITE = "<?php echo WEBSITE; ?>";
</script>
<script type="text/javascript" src="<?php echo WEBSITE . 'js/admin/edit_requesttype_modal.js'; ?>"></script>

<div class="modal-header panel-heading">
    <h4 class="modal-title"><b>Edit Request Type</b></h4>
    <button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign"></span></button>
    
</div>

<div class="modal-body">
  <?php
    $requesttype_details = "SELECT * FROM ".request_types." WHERE id='".$get_id."'";
    $requesttype_details_res = mysqli_query($conn,$requesttype_details) or die(mysqli_error($conn));
    $requesttype_details_row = mysqli_fetch_assoc($requesttype_details_res);
  ?>
  <form method="POST" id="editForm" name="editForm">

  <input type="hidden" name="requesttypeId" id="requesttypeid" value="<?php echo core_encrypt($get_id); ?>">
  <label> Request Type Name : </label>
  <input type="text" name="requesttypeName" class="form-control" required value="<?php echo $requesttype_details_row['name']; ?>">
  </br> 
  <label> Status : </label>
  <input type="radio" name="requesttypeStatus" value="Y" required <?php echo ($requesttype_details_row['status'] == "Y") ? 'checked' : '' ; ?> > Active </label>
  <input type="radio" name="requesttypeStatus" value="N" required <?php echo ($requesttype_details_row['status'] == "N") ? 'checked' : '' ; ?> > Inactive </label>
  </br>
  <input type="submit" name="submitEdit" id="submitEdit" value="Update" class="btn btn-danger">
  <input type="button" value="Cancel" data-dismiss="modal" class="btn btn-danger">
</form>
</div>