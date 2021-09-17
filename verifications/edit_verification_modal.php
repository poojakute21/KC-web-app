<?php 
$get_id = core_decrypt(filter_input(INPUT_GET, 'id'));
$verification_details = "select * from ".request_details." a INNER JOIN ".request_details_delivery." b
ON a.id= b.request_id WHERE a.id ='".$get_id."'";
$verification_details_res = mysqli_query($conn,$verification_details) or die(mysqli_error($conn));
$verification_details_row = mysqli_fetch_assoc($verification_details_res);
?>
<script type="text/javascript">
  var WEBSITE = "<?php echo WEBSITE; ?>";
</script>
<script type="text/javascript" src="<?php echo WEBSITE . 'js/verfications/edit_verification_modal.js'; ?>"></script>
<div class="panel panel-primary">
  <div class="panel-heading">
    <b>Add Details</b>
</div>
<div class="panel-body">
 <form method="POST" id="addForm" name="addForm">
 <input type="hidden" name="verificationId" id="verificationId" value="<?php echo core_encrypt($get_id); ?>">
  <label>Full Name : </label>
  <input type="text" name="fullName" class="form-control" value="<?php echo $verification_details_row['name']; ?>"></br>
  <label> Address : </label>
  <textarea name="verificationAddress" class="form-control"><?php echo $verification_details_row['address']; ?></textarea></br>
  <label> Email : </label>
  <input type="text" name="emailAddress" class="form-control" value="<?php echo $verification_details_row['email']; ?>"></br>
  <label> Contact No : </label>
  <input type="text" name="contactNumber" class="form-control" value="<?php echo $verification_details_row['contact_no']; ?>"></br>

  <label> Document Type : </label>
  <select name="documentType"  class="form-control">
    <option value="">Please Select</option>
  <?php 
    $sql_document = "select name,id from ".document_type." WHERE status='Y'";
    $result_document = mysqli_query($conn,$sql_document) or die(mysqli_error($conn));
    while($row_document = mysqli_fetch_array($result_document)){

  ?>
    <option value=<?php echo $row_document['id']; ?> <?php echo ($row_document['id'] == $verification_details_row['document_id']) ? 'selected' : '' ; ?>><?php echo ($row_document['name']); ?></option>
  <?php
    }
  ?>
  </select></br>
  <label> Document No: </label>
  <input name="documentNumber" type="text" class="form-control" value="<?php echo $verification_details_row['document_no']; ?>">
  <label> No of People : </label>
  <input type="number" name="noofPeople" class="form-control" value="<?php echo $verification_details_row['no_of_people']; ?>"></br>
  <label> Is Beneficiary : </label>
  <select name="isBeneficiary"  class="form-control">
    <option value="">Please Select</option>
    <option value="Y" <?php echo ($verification_details_row['is_beneficiary'] == "Y") ? 'selected' : '' ; ?>>YES</option>
    <option value="N" <?php echo ($verification_details_row['is_beneficiary'] == "N") ? 'selected' : '' ; ?>>NO</option>
  </select></br>
  <label> Aid Form: </label>
  <select name="aidform"  class="form-control">
    <option value="">Please Select</option>
  <?php 
    $sql_request_types = "select name,id from ".request_types." WHERE status='Y'";
    $result_request_types = mysqli_query($conn,$sql_request_types) or die(mysqli_error($conn));
    while($row_request_types = mysqli_fetch_array($result_request_types)){

  ?>
    <option value=<?php echo $row_request_types['id']; ?> <?php echo ($row_request_types['id'] == $verification_details_row['aid_form']) ? 'selected' : '' ; ?>><?php echo ($row_request_types['name']); ?></option>
  <?php
    }
  ?>
  </select></br>
  <label> Status : </label>
  <select name="progressStatus"  class="form-control">
    <option value="">Please Select</option>
  <?php 
    $sql_progress_status = "select name,id from ".request_status." WHERE status='Y' AND used_in='VERIF_FORM'";
    $result_progress_status = mysqli_query($conn,$sql_progress_status) or die(mysqli_error($conn));
    while($row_progress_status = mysqli_fetch_array($result_progress_status)){

  ?>
    <option value=<?php echo $row_progress_status['id']; ?> <?php echo ($row_progress_status['id'] == $verification_details_row['request_status_id']) ? 'selected' : '' ; ?>><?php echo ($row_progress_status['name']); ?></option>
  <?php
    }
  ?>
  </select></br> 
  <input type="button" name="submitEdit" id="submitEdit" value="Update" class="btn btn-danger">
  <a href="<?php echo WEBSITE . "main.php?page=verifications/verifications";  ?>">
            <input type="button" value="Cancel"  class="btn btn-danger"></a>
  </form>
</div>
</div>
