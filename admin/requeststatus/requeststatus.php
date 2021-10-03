<?php
$requeststatus_details = "select * from ".request_status;
$requeststatus_details_res = mysqli_query($conn,$requeststatus_details) or die(mysqli_error($conn));

?>
<html>
<script>
$(document).ready(function() {
    $('.table-bordered').DataTable();
});

function onClickEdit(id){
  $.ajax({url: 'ajax_index.php?page=admin/requeststatus/edit_requeststatus_modal&id=' + id, 
    success: function(result){
    $("#editChannelModal").find(".modal-content").html(result);
    $('#editChannelModal').modal('show');
  }});
}

var WEBSITE = "<?php echo WEBSITE; ?>";

</script>
<div class="panel panel-primary">
  <div class="panel-heading">
    <b>Request Status Details</b>
    <a class="menu-list" style="margin-left: 70%;" href="<?php echo WEBSITE . "ajax_index.php?page=admin/requeststatus/add_requeststatus_modal";  ?>" data-toggle="modal" data-target="#addrequeststatusModal">
            Add Request Status Type</a>
  </div>
  
  <div class="panel-body">
    <table class="table table-bordered dt-responsive nowrap dataTable no-footer">
        <thead>
          <tr>
            <th class="text-center">Request Status ID</th>
            <th class="text-center">Request Status Name</th>
            <th class="text-center">Request Status Status</th>
            <th class="text-center">Edit</th>
            <!-- <th class="text-center">Delete</th> -->
          </tr>
        </thead>
        <tbody>
        <?php
        if(mysqli_num_rows($requeststatus_details_res) > 0):
        while($requeststatus_details_row = mysqli_fetch_array($requeststatus_details_res)):?>
          <tr>
            <td class="text-center"><?php echo $requeststatus_details_row['id']; ?></td>
            <td class="text-center"><?php echo $requeststatus_details_row['name']; ?></td>
            <td class="text-center"><?php echo get_status($requeststatus_details_row['status']); ?></td>
            <?php $requeststatus_id = core_encrypt($requeststatus_details_row['id']); ?>
            <td class="text-center">
            <p style="color:#CE232B !important;" onclick="onClickEdit('<?php echo $requeststatus_id; ?>')">
                <span class="glyphicon glyphicon-edit"></span>
              </p>
            </td>
          </tr>
        <?php 
        endwhile;
      endif;?>
        </tbody>
        </table>
  </div>
</div>
</html>
<!-- add Request Status -->
<div id="addrequeststatusModal" class="modal fade">
    <div class="modal-dialog modal-md" style="margin-top:18%;">
        <div class="modal-content">
        </div>
    </div>
</div>
<!-- edit Request Status -->
<div id="editrequeststatusModal" class="modal fade">
    <div class="modal-dialog modal-md" style="margin-top:18%;">
        <div class="modal-content">
        </div>
    </div>
</div>