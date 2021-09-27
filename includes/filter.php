<?php

print_r($_POST);
?>
<div class="form-group" style="margin-top:20px;">
    <form action="" method="POST" name="filter_form">
      <div class="row" style="margin-left:20px;">
        <div class="col-md-4">
          <select name="request_type" class="form-control">
            <option>Select Request Type</option>
            <option value="bulk" <?php echo (isset($_POST['request_type']) == 'bulk')?'selected':''; ?> >Bulk</option>
            <option value="single" <?php echo (isset($_POST['request_type']) == 'single')?'selected':''; ?>>Single</option>
          </select>
        </div>
        <div class="col-md-4">
          <select name="level" style="margin-left:20px;" class="form-control">
            <option>Select Level</option>
            <option value="verification" <?php echo (isset($_POST['level']) == 'verification')?'selected':''; ?> >Verification</option>
            <option value="schedule" <?php echo (isset($_POST['level']) == 'schedule')?'selected':''; ?> >Scheduling</option>
            <option value="delivery" <?php echo (isset($_POST['level']) == 'delivery')?'selected':''; ?> >Delivery</option>
          </select>
        </div>
        <div class="col-md-4">
          <select name="status" style="margin-left:20px;" class="form-control">
            <option>Select Status</option>
            <option value="P" <?php echo (isset($_POST['status']) == 'P')?'selected':''; ?> >Pending</option>
            <option value="Y" <?php echo (isset($_POST['status']) == 'Y')?'selected':''; ?> >Approve</option>
            <option value="N" <?php echo (isset($_POST['status']) == 'N')?'selected':''; ?> >Reject</option>
          </select>
        </div>
      </div>
        <div class="row" style="margin-left:20px;">
          <p>Date:<input type="text" class="form-control" name="filter_date" id="dp" onclick="$('#dp').datepicker();$('#dp').datepicker('show');" value="<?php echo isset($_POST['filter_date']); ?> "></p>
        </div>

        <button type="submit" name="submit" class="btn btn-danger" style="margin-left: 20px;height: 25px;">Submit</button>
      </div>
    </form>
  </div>