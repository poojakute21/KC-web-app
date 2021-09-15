<?php 
$get_id = core_decrypt(filter_input(INPUT_GET, 'id'));

?>
<script type="text/javascript">
  var WEBSITE = "<?php echo WEBSITE; ?>";
  $(document).ready(function () {
    $('#example').datepicker(); 
  });
</script>
<script type="text/javascript" src="<?php echo WEBSITE . 'js/admin/edit_volunteer_modal.js'; ?>"></script>

<div class="modal-header panel-heading">
    <h4 class="modal-title"><b>Edit Volunteer</b></h4>
    <button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign"></span></button>
    
</div>

<div class="modal-body">
  <?php
    $volunteer_details = "SELECT * FROM ".volunteers_details." WHERE id='".$get_id."'";
    $volunteer_details_res = mysqli_query($conn,$volunteer_details) or die(mysqli_error($conn));
    $volunteer_details_row = mysqli_fetch_assoc($volunteer_details_res);
  ?>
  <form method="POST" id="editForm" name="editForm">

  <input type="hidden" name="volunteerId" id="volunteerid" value="<?php echo core_encrypt($get_id); ?>">
  <label>Full Name : </label>
  <input type="text" name="volunteerName" class="form-control" value="<?php echo $volunteer_details_row['name']; ?>"></br>
  <label> Email : </label>
  <input type="text" name="volunteerEmail" class="form-control" value="<?php echo $volunteer_details_row['email']; ?>"></br>
  <label> Contact No : </label>
  <input type="text" name="volunteerContact" class="form-control" value="<?php echo $volunteer_details_row['contact_no']; ?>"></br>
  <label> Date of Birth : </label>
  <?php //echo $volunteer_details_row['date_of_birth'];echo date("Y-m-d", strtotime($volunteer_details_row['date_of_birth']));?>
  <input placeholder="Select date" name="volunteerBirthdate" type="text" id="example" class="form-control" 
  value="<?php if($volunteer_details_row['date_of_birth'] == '0000-00-00') { echo 'Select date'; } else {echo date("Y-m-d", strtotime($volunteer_details_row['date_of_birth']));} ?>">
  <label> Address : </label>
  <textarea name="volunteerAddress" class="form-control" ><?php echo $volunteer_details_row['address']; ?></textarea></br>
  <label> Role : </label>
  <select name="volunteerRole"  class="form-control" >
    <option value="">Please Select</option>
  <?php 
    $sql = "select name,id from ".roles." WHERE status='Y'";
    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    while($row = mysqli_fetch_array($result)){

  ?>
    <option value=<?php echo $row['id']; ?> <?php echo ($row['id'] == $volunteer_details_row['role_id']) ? 'selected' : '' ; ?>><?php echo $row['name']; ?></option>
  <?php
    }
  ?>
  </select></br>
  <label> Status : </label>
  <input type="radio" name="volunteerStatus" value="Y" value="<?php echo $volunteer_details_row['name']; ?>"> Active </label>
  <input type="radio" name="volunteerStatus" value="N" value="<?php echo $volunteer_details_row['name']; ?>"> Inactive </label>
  </br>
  <input type="button" name="submitEdit" id="submitEdit" value="Update" class="btn btn-danger">
  <input type="button" value="Cancel" data-dismiss="modal" class="btn btn-danger">
</form>
</div>