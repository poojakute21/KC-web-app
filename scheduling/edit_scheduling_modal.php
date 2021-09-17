<?php 
$get_id = core_decrypt(filter_input(INPUT_GET, 'id'));
$verification_details = "select * from ".request_details." a INNER JOIN ".request_details_delivery." b
ON a.id= b.request_id WHERE a.id ='".$get_id."'";
$verification_details_res = mysqli_query($conn,$verification_details) or die(mysqli_error($conn));
$verification_details_row = mysqli_fetch_assoc($verification_details_res);
?>
<script type="text/javascript">
  var WEBSITE = "<?php echo WEBSITE; ?>";
  $(document).ready(function () {
    $('#scheduledOn').datepicker(); 
  });
</script>
<script type="text/javascript" src="<?php echo WEBSITE . 'js/admin/edit_volunteer_modal.js'; ?>"></script>

<div class="modal-header panel-heading">
    <h4 class="modal-title"><b>Scheduling</b></h4>
    <button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign"></span></button>
    
</div>

<div class="modal-body">
<label>Approved Kits : </label>
  <input type="text" name="approvedKits" class="form-control" value=""></br>
  <label> Scheduled On : </label>
  <input placeholder="Select date" name="scheduledOn" type="text" id="scheduledOn" class="form-control">
  
<label> Status : </label>
  <select name="progressStatus"  class="form-control">
    <option value="">Please Select</option>
  <?php 
    $sql_progress_status = "select name,id from ".request_status." WHERE status='Y' AND used_in IN 'SCHED_FORM'";
    $result_progress_status = mysqli_query($conn,$sql_progress_status) or die(mysqli_error($conn));
    while($row_progress_status = mysqli_fetch_array($result_progress_status)){

  ?>
    <option value=<?php echo $row_progress_status['id']; ?> ><?php echo ($row_progress_status['name']); ?></option>
  <?php
    }
  ?>
  </select></br> 
  <label> Remark : </label>
  <textarea name="remarks" class="form-control"></textarea></br>
  <label> Status : </label>
  <input type="radio" name="volunteerStatus" value="Y" value="<?php echo $volunteer_details_row['name']; ?>"> Active </label>
  <input type="radio" name="volunteerStatus" value="N" value="<?php echo $volunteer_details_row['name']; ?>"> Inactive </label>
  </br>
  <input type="button" name="submitEdit" id="submitEdit" value="Update" class="btn btn-danger">
  <input type="button" value="Cancel" data-dismiss="modal" class="btn btn-danger">
</form>
</div>