<script type="text/javascript">
  var WEBSITE = "<?php echo WEBSITE; ?>";
  $(document).ready(function () {
    $('#example').datepicker(); 
  });
</script>
<script type="text/javascript" src="<?php echo WEBSITE . 'js/admin/add_volunteer_modal.js'; ?>"></script>

<div class="modal-header panel-heading">
    <h4 class="modal-title"><b>Add Volunteer</b></h4>
    <button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign"></span></button>
    
</div>

<div class="modal-body">
  <form method="POST" id="addForm" name="addForm">
  <label>Full Name : </label>
  <input type="text" name="volunteerName" class="form-control"></br>
  <label> Email : </label>
  <input type="text" name="volunteerEmail" class="form-control"></br>
  <label> Contact No : </label>
  <input type="text" name="volunteerContact" class="form-control"></br>
  <label> Date of Birth : </label>
  <input placeholder="Select date" name="volunteerBirthdate" type="text" id="example" class="form-control">
  <label> Address : </label>
  <textarea name="volunteerAddress" class="form-control"></textarea></br>
  <label> Role : </label>
  <select name="volunteerRole"  class="form-control">
    <option value="">Please Select</option>
  <?php 
    $sql = "select name,id from ".roles." WHERE status='Y'";
    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    while($row = mysqli_fetch_array($result)){

  ?>
    <option value=<?php echo $row['id']; ?>><?php echo $row['name']; ?></option>
  <?php
    }
  ?>
  </select></br>
  <label> Status : </label>
  <input type="radio" name="volunteerStatus" value="Y" > Active </label>
  <input type="radio" name="volunteerStatus" value="N" > Inactive </label>
  </br>
  <input type="button" name="submitAdd" id="submitAdd" value="Add" class="btn btn-danger">
  <input type="button" value="Cancel" data-dismiss="modal" class="btn btn-danger">
  </form>
</div>