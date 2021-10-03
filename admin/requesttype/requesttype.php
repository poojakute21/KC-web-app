<?php
$requesttype_details = "select * from ".request_types;
$requesttype_details_res = mysqli_query($conn,$requesttype_details) or die(mysqli_error($conn));

?>
<html>
<script>
$(document).ready(function() {
    $('.table-bordered').DataTable();
});
function onClickEdit(id){
  $.ajax({url: 'ajax_index.php?page=admin/documenttype/edit_document_modal&id=' + id, 
    success: function(result){
    $("#editChannelModal").find(".modal-content").html(result);
    $('#editChannelModal').modal('show');
  }});
}

var WEBSITE = "<?php echo WEBSITE; ?>";

</script>
<div class="panel panel-primary">
  <div class="panel-heading">
    <b>requesttype Details</b>
    <a class="menu-list" style="margin-left: 70%;" href="<?php echo WEBSITE . "ajax_index.php?page=admin/requesttype/add_requesttype_modal";  ?>" data-toggle="modal" data-target="#addrequesttypeModal">
            Add Request Type</a>
  </div>
  
  <div class="panel-body">
    <table class="table table-bordered dt-responsive nowrap dataTable no-footer">
        <thead>
          <tr>
            <th class="text-center">Request Type ID</th>
            <th class="text-center">Request Type Name</th>
            <th class="text-center">Request Type Status</th>
            <th class="text-center">Edit</th>
            <!-- <th class="text-center">Delete</th> -->
          </tr>
        </thead>
        <tbody>
        <?php
        if(mysqli_num_rows($requesttype_details_res) > 0):
        while($requesttype_details_row = mysqli_fetch_array($requesttype_details_res)):?>
          <tr>     
            <td class="text-center"><?php echo $requesttype_details_row['id']; ?></td>   
            <td class="text-center"><?php echo $requesttype_details_row['name']; ?></td>
            <td class="text-center"><?php echo get_status($requesttype_details_row['status']); ?></td>
            <?php $requesttype_id = core_encrypt($requesttype_details_row['id']); ?>
            <td class="text-center"><a style="color:#CE232B !important;" href="<?php echo WEBSITE . "ajax_index.php?page=admin/requesttype/edit_requesttype_modal&id=" . $requesttype_id;  ?>" data-toggle="modal" data-target="#editrequesttypeModal">
            <span class="glyphicon glyphicon-edit"></span></a>
            </td>
            <!--<td class="text-center"><a style="color:#CE232B !important;" onclick="Deleterequesttype('<?php echo $requesttype_id; ?>')">
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
<!-- add requesttype -->
<div id="addrequesttypeModal" class="modal fade">
    <div class="modal-dialog modal-md" style="margin-top:18%;">
        <div class="modal-content">
        </div>
    </div>
</div>
<!-- edit requesttype -->
<div id="editrequesttypeModal" class="modal fade">
    <div class="modal-dialog modal-md" style="margin-top:18%;">
        <div class="modal-content">
        </div>
    </div>
</div>