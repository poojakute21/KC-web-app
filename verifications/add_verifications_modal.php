<script type="text/javascript">
  var WEBSITE = "<?php echo WEBSITE; ?>";
</script>
<script type="text/javascript" src="<?php echo WEBSITE . 'js/verfications/add_verification_modal.js'; ?>"></script>
<div class="panel panel-primary">
  <div class="panel-heading">
    <b>Add Details</b>
</div>
<div class="panel-body">
 <form method="POST" id="addForm" name="addForm">
  <label>Full Name : </label>
  <input type="text" name="fullName" class="form-control"></br>
  <label> Address : </label>
  <textarea name="verificationAddress" class="form-control"></textarea></br>
  <label> Email : </label>
  <input type="text" name="emailAddress" class="form-control"></br>
  <label> Contact No : </label>
  <input type="text" name="contactNumber" class="form-control"></br>
  <label> Channel Type : </label>
  <select name="channelType"  class="form-control">
    <option value="">Please Select</option>
  <?php 
    $sql_channel = "select name,id from ".channel_type." WHERE status='Y'";
    $result_channel = mysqli_query($conn,$sql_channel) or die(mysqli_error($conn));
    while($row_channel = mysqli_fetch_array($result_channel)){

  ?>
    <option value=<?php echo $row_channel['id']; ?>><?php echo ($row_channel['name']); ?></option>
  <?php
    }
  ?>
  </select></br>
  <label> Document Type : </label>
  <select name="documentType"  class="form-control">
    <option value="">Please Select</option>
  <?php 
    $sql_document = "select name,id from ".document_type." WHERE status='Y'";
    $result_document = mysqli_query($conn,$sql_document) or die(mysqli_error($conn));
    while($row_document = mysqli_fetch_array($result_document)){

  ?>
    <option value=<?php echo $row_document['id']; ?>><?php echo ($row_document['name']); ?></option>
  <?php
    }
  ?>
  </select></br>
  <label> Document No: </label>
  <input name="documentNumber" type="text" class="form-control">
  <label> No of People : </label>
  <input type="number" name="noofPeople" class="form-control"></br>
  <label> Is Beneficiary : </label>
  <select name="isBeneficiary"  class="form-control">
    <option value="">Please Select</option>
    <option value="Y">YES</option>
    <option value="N">NO</option>
  </select></br>
  <label> Aid Form: </label>
  <select name="aidform"  class="form-control">
    <option value="">Please Select</option>
  <?php 
    $sql_request_types = "select name,id from ".request_types." WHERE status='Y'";
    $result_request_types = mysqli_query($conn,$sql_request_types) or die(mysqli_error($conn));
    while($row_request_types = mysqli_fetch_array($result_request_types)){

  ?>
    <option value=<?php echo $row_request_types['id']; ?>><?php echo ($row_request_types['name']); ?></option>
  <?php
    }
  ?>
  </select></br>
  <label> Request Type: </label>
  <select name="requestType"  class="form-control">
    <option value="">Please Select</option>
    <option value="single">SINGLE</option>
    <option value="buld">BULK</option>
  </select></br>
  <label> Status : </label>
  <select name="progressStatus"  class="form-control">
    <option value="">Please Select</option>
  <?php 
    $sql_progress_status = "select name,id from ".request_status." WHERE status='Y'";
    $result_progress_status = mysqli_query($conn,$sql_progress_status) or die(mysqli_error($conn));
    while($row_progress_status = mysqli_fetch_array($result_progress_status)){

  ?>
    <option value=<?php echo $row_progress_status['id']; ?>><?php echo get_requesttype($row_progress_status['name']); ?></option>
  <?php
    }
  ?>
  </select></br>
  <input type="button" name="submitAdd" id="submitAdd" value="Add" class="btn btn-danger">
  <a href="<?php echo WEBSITE . "main.php?page=verifications/verifications";  ?>">
            <input type="button" value="Cancel"  class="btn btn-danger"></a>
  </form>
</div>
</div>
