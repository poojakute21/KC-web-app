<div class="form-group" style="margin-top:20px;">
    <form action="" method="POST" name="filter_form">
      <div class="row" style="margin-left:20px;">

        <select name="request_type">
          <option>Select Request Type</option>
          <option value="bulk" <?php echo ($_POST['request_type'] == 'bulk')?'selected':''; ?> >Bulk</option>
          <option value="single" <?php echo ($_POST['request_type'] == 'single')?'selected':''; ?>>Single</option>
        </select>

        <select name="level" style="margin-left:20px;">
          <option>Select Level</option>
          <option value="verification" <?php echo ($_POST['level'] == 'verification')?'selected':''; ?> >Verification</option>
          <option value="schedule" <?php echo ($_POST['level'] == 'schedule')?'selected':''; ?> >Scheduling</option>
          <option value="delivery" <?php echo ($_POST['level'] == 'delivery')?'selected':''; ?> >Delivery</option>
        </select>

        <select name="status" style="margin-left:20px;">
          <option>Select Status</option>
          <option value="P" <?php echo ($_POST['status'] == 'P')?'selected':''; ?> >Pending</option>
          <option value="Y" <?php echo ($_POST['status'] == 'Y')?'selected':''; ?> >Approve</option>
          <option value="N" <?php echo ($_POST['status'] == 'N')?'selected':''; ?> >Reject</option>
        </select>

        <div class="" style="margin-left:20px;">
          <p>Date: <input type="text" name="filter_date" id="dp" onclick="$('#dp').datepicker();$('#dp').datepicker('show');" value="<?php echo $_POST['filter_date']; ?> "></p>
        </div>

        <button type="submit" name="submit" class="btn btn-danger" style="margin-left: 20px;height: 25px;">Submit</button>
      </div>
    </form>
  </div>