<script type="text/javascript">
  var WEBSITE = "<?php echo WEBSITE; ?>";
</script>
<script type="text/javascript" src="<?php echo WEBSITE . 'js/admin/add_role_modal.js'; ?>"></script>

<div class="modal-header panel-heading">
    <h4 class="modal-title"><b>Add Role</b></h4>
    <button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign"></span></button>
    
</div>

<div class="modal-body">
  <form method="POST" id="addForm" name="addForm">
  <label> Role Name : </label>
  <input type="text" name="roleName" class="form-control">
  </br> 
  <label> Status : </label>
  <input type="radio" name="roleStatus" value="Y" > Active </label>
  <input type="radio" name="roleStatus" value="N" > Inactive </label>
  </br>
  <input type="button" name="submitAdd" id="submitAdd" value="Add" class="btn btn-danger">
  <input type="button" value="Cancel" data-dismiss="modal" class="btn btn-danger">
</form>
</div>