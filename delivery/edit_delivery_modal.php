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
    $('#deliveredOn').datepicker({
    }); 
  });
</script>
<script type="text/javascript" src="<?php echo WEBSITE . 'js/delivery/edit_delivery_modal.js'; ?>"></script>

<div class="modal-header panel-heading">
    <h4 class="modal-title"><b>Delivery Details</b></h4>
    <button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign"></span></button>
    
</div>

<div class="modal-body">
<form method="POST" id="editForm" name="editForm">

    <input type="hidden" name="verificationId" value="<?php echo core_encrypt($get_id);?>">
<label>Delivered To Name : </label>
  <input type="text" name="deliveredtoName" class="form-control"></br>
  <label> Delivered Location : </label>
  <input name="deliveredLocation" type="text"  class="form-control">
  
  <label> Delivered to Contact : </label>
  <input type="text" name="deliveredtoContact" class="form-control" value=""></br>
 
  </br>
  <label>Delivered By : </label>
  <input type="text" name="deliveredBy" class="form-control" value=""></br>
  <label> Delivered On : </label>
  <input placeholder="Select date" name="deliveredOn" type="text" id="deliveredOn" class="form-control">
  
<label> Delivered By Contact : </label>
<input type="text" name="deliveredbyContact" class="form-control" value=""></br>
 </br> 
 <label> Status : </label>
  <select name="progressStatus"  class="form-control">
    <option value="">Please Select</option>
    <option value="P" <?php echo ($verification_details_row['delivery_status'] == "P") ? 'selected' : '' ; ?>>Pending</option>
    <option value="Y" <?php echo ($verification_details_row['delivery_status'] == "Y") ? 'selected' : '' ; ?>>Approved</option>
    <option value="N" <?php echo ($verification_details_row['delivery_status'] == "N") ? 'selected' : '' ; ?>>Rejected</option>
  </select></br> 
  <label> Remark : </label>
  <textarea name="remarks" class="form-control"></textarea></br>
  <input type="button" name="submitEdit" id="submitEdit" value="Update" class="btn btn-danger">
  <input type="button" value="Cancel" data-dismiss="modal" class="btn btn-danger">
</form>
</div>