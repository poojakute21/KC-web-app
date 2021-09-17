<?php 
$get_id = core_decrypt(filter_input(INPUT_GET, 'id'));

?>
<script type="text/javascript">
  var WEBSITE = "<?php echo WEBSITE; ?>";
</script>
<script type="text/javascript" src="<?php echo WEBSITE . 'js/admin/edit_role_modal.js'; ?>"></script>

<div class="modal-header panel-heading">
    <h4 class="modal-title"><b>Edit Role</b></h4>
    <button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign"></span></button>
    
</div>

<div class="modal-body">
  <?php
    $role_details = "SELECT * FROM ".roles." WHERE id='".$get_id."'";
    $role_details_res = mysqli_query($conn,$role_details) or die(mysqli_error($conn));
    $role_details_row = mysqli_fetch_assoc($role_details_res);
  ?>
  <form method="POST" id="editForm" name="editForm">

  <input type="hidden" name="roleId" id="roleid" value="<?php echo core_encrypt($get_id); ?>">
  <label> Role Name : </label>
  <input type="text" name="roleName" class="form-control" value="<?php echo $role_details_row['name']; ?>" required pattern="[A-Za-z0-9]+" maxlength="50" title="Max 50 Character and Numbers allowed!">
  </br> 
  <label> Status : </label>
  <input type="radio" name="roleStatus" value="Y" required <?php echo ($role_details_row['status'] == "Y") ? 'checked' : '' ; ?> > Active </label>
  <input type="radio" name="roleStatus" value="N" required <?php echo ($role_details_row['status'] == "N") ? 'checked' : '' ; ?> > Inactive </label>
  </br>
  <input type="submit" name="submitEdit" id="submitEdit" value="Update" class="btn btn-danger">
  <input type="button" value="Cancel" data-dismiss="modal" class="btn btn-danger">
</form>
</div>