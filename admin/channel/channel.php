<?php
$channel_details = "select * from ".channel_type;
$channel_details_res = mysqli_query($conn,$channel_details) or die(mysqli_error($conn));

?>
<html>
<script>
$(document).ready(function() {
    $('.table-bordered').DataTable();
});

function onClickEdit(id){
  $.ajax({url: 'ajax_index.php?page=admin/channel/edit_channel_modal&id=' + id, 
    success: function(result){
    $("#editChannelModal").find(".modal-content").html(result);
    $('#editChannelModal').modal('show');
  }});
}

var WEBSITE = "<?php echo WEBSITE; ?>";

</script>
<div class="panel panel-primary">
  <div class="panel-heading">
    <b>Channel Details</b>
    <a class="menu-list" style="margin-left: 70%;" href="<?php echo WEBSITE . "ajax_index.php?page=admin/channel/add_channel_modal";  ?>" data-toggle="modal" data-target="#addChannelModal">
            Add Channel Type</a>
  </div>
  
  <div class="panel-body">
    <table class="table table-bordered dt-responsive nowrap dataTable no-footer">
        <thead>
          <tr>
            <th class="text-center">Channel ID</th>
            <th class="text-center">Channel Name</th>
            <th class="text-center">Channel Status</th>
            <th class="text-center">Edit</th>
            <!-- <th class="text-center">Delete</th> -->
          </tr>
        </thead>
        <tbody>
        <?php
        if(mysqli_num_rows($channel_details_res) > 0):
        while($channel_details_row = mysqli_fetch_array($channel_details_res)):?>
          <tr>
            <td class="text-center"><?php echo $channel_details_row['id']; ?></td>
            <td class="text-center"><?php echo $channel_details_row['name']; ?></td>
            <td class="text-center"><?php echo get_status($channel_details_row['status']); ?></td>
            <?php $channel_id = core_encrypt($channel_details_row['id']); ?>
            <td class="text-center">
              
              <!-- <a style="color:#CE232B !important;" href="<?php //echo WEBSITE . "ajax_index.php?page=admin/channel/edit_channel_modal&id=" . $channel_id;  ?>" data-toggle="modal" data-target="#editChannelModal">
                <span class="glyphicon glyphicon-edit"></span>
              </a> -->

              <p style="color:#CE232B !important;" onclick="onClickEdit('<?php echo $channel_id; ?>')">
                <span class="glyphicon glyphicon-edit"></span>
              </p>

            </td>
            <!--<td class="text-center"><a style="color:#CE232B !important;" onclick="DeleteChannel('<?php echo $channel_id; ?>')">
              <span class="glyphicon glyphicon-remove" ></span></a>
            </td>-->
          </tr>
        <?php 
        endwhile;
      endif;?>
        </tbody>
        </table>
  </div>
</div>
</html>
<!-- add channel -->
<div id="addChannelModal" class="modal fade">
    <div class="modal-dialog modal-md" style="margin-top:18%;">
        <div class="modal-content">
        </div>
    </div>
</div>
<!-- edit channel -->
<div id="editChannelModal" class="modal fade">
    <div class="modal-dialog modal-md" style="margin-top:18%;">
        <div class="modal-content">
        </div>
    </div>
</div>
