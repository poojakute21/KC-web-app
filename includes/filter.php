<?php //print_r($_POST); ?>
<div class="form-group" style="margin-top:20px;">
    <form action="" method="POST" name="filter_form">
      <div class="row" style="margin-left:20px;">
        <div class="col-md-4">
          <?php
            $selected_type = "";
            if(isset($_POST['request_type'])){
              $selected_type = $_POST['request_type'];
            }
          ?>
          <select name="request_type" class="form-control">
            <option>Select Request Type</option>
            <option value="bulk" <?php echo ($selected_type == 'bulk')?'selected':''; ?> >Bulk</option>
            <option value="single" <?php echo ($selected_type == 'single')?'selected':''; ?>>Single</option>
          </select>
        </div>
        <div class="col-md-4">
          <?php
            $selected_level = "";
            if(isset($_POST['level'])){
              $selected_level = $_POST['level'];
            }
          ?>
          <select name="level" style="margin-left:20px;" class="form-control">
            <option>Select Level</option>
            <option value="verification" <?php echo ($selected_level == 'verification')?'selected':''; ?> >Verification</option>
            <option value="schedule" <?php echo ($selected_level == 'schedule')?'selected':''; ?> >Scheduling</option>
            <option value="delivery" <?php echo ($selected_level == 'delivery')?'selected':''; ?> >Delivery</option>
          </select>
        </div>
        <div class="col-md-4">
          <?php
            $selected_status = "";
            if(isset($_POST['status'])){
              $selected_status = $_POST['status'];
            }
          ?>
          <select name="status" style="margin-left:20px;" class="form-control">
            <option>Select Status</option>
            <option value="P" <?php echo ($selected_status == 'P')?'selected':''; ?> >Pending</option>
            <option value="Y" <?php echo ($selected_status == 'Y')?'selected':''; ?> >Approve</option>
            <option value="N" <?php echo ($selected_status == 'N')?'selected':''; ?> >Reject</option>
          </select>
        </div>
      </div>
        <div class="row" style="margin-left:20px;">
          <?php
            $selected_date = "";
            if(isset($_POST['filter_date'])){
              $selected_date = $_POST['filter_date'];
            }
          ?>
          <p>Date:<input type="text" class="form-control" name="filter_date" id="dp" onclick="$('#dp').datepicker();$('#dp').datepicker('show');" value="<?php echo $selected_date; ?> "></p>
        </div>

        <button type="submit" name="submit" class="btn btn-danger" style="margin-left: 20px;height: 25px;">Submit</button>
      </div>
    </form>
  </div>