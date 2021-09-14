<?php 
$get_id = core_decrypt(filter_input(INPUT_GET, 'id'));

?>
<script type="text/javascript">
  var WEBSITE = "<?php echo WEBSITE; ?>";
</script>
<script type="text/javascript" src="<?php echo WEBSITE . 'js/admin/edit_channel_modal.js'; ?>"></script>

<div class="modal-header panel-heading">
    <h4 class="modal-title"><b>Edit Channel</b></h4>
    <button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign"></span></button>
    
</div>

<div class="modal-body">
  <?php
    $channel_details = "SELECT * FROM ".channel_type." WHERE id='".$get_id."'";
    $channel_details_res = mysqli_query($conn,$channel_details) or die(mysqli_error($conn));
    $channel_details_row = mysqli_fetch_assoc($channel_details_res);
  ?>
  <form method="POST" id="editForm" name="editForm">

  <input type="hidden" name="channelId" id="channelid" value="<?php echo core_encrypt($get_id); ?>">
  <label> Channel Name : </label>
  <input type="text" name="channelName" class="form-control" value="<?php echo $channel_details_row['name']; ?>">
  </br> 
  <label> Status : </label>
  <input type="radio" name="channelStatus" value="Y" <?php echo ($channel_details_row['status'] == "Y") ? 'checked' : '' ; ?> > Active </label>
  <input type="radio" name="channelStatus" value="N" <?php echo ($channel_details_row['status'] == "N") ? 'checked' : '' ; ?> > Inactive </label>
  </br>
  <input type="button" name="submitEdit" id="submitEdit" value="Update" class="btn btn-danger">
  <input type="button" value="Cancel" data-dismiss="modal" class="btn btn-danger">
</form>
</div>