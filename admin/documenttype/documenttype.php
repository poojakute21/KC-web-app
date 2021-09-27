<?php
$documenttype_details = "select * from ".document_type;
$documenttype_details_res = mysqli_query($conn,$documenttype_details) or die(mysqli_error($conn));

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
    <b>Document Type Details</b>
    <a class="menu-list" style="margin-left: 70%;" href="<?php echo WEBSITE . "ajax_index.php?page=admin/documenttype/add_document_modal";  ?>" data-toggle="modal" data-target="#addDocumentTypeModal">
            Add Document Type</a>
  </div>
  
  <div class="panel-body">
    <table class="table table-bordered dt-responsive nowrap dataTable no-footer">
        <thead>
          <tr>
            <th class="text-center">Document ID</th>
            <th class="text-center">Document Name</th>
            <th class="text-center">Document Status</th>
            <th class="text-center">Edit</th>
            <!-- <th class="text-center">Delete</th> -->
          </tr>
        </thead>
        <tbody>
        <?php
        if(mysqli_num_rows($documenttype_details_res) > 0):
        while($documenttype_details_row = mysqli_fetch_array($documenttype_details_res)):?>
          <tr>
          <php //print_r($channel_details_row);?>
            <td class="text-center"><?php echo $documenttype_details_row['id']; ?></td>
            <td class="text-center"><?php echo $documenttype_details_row['name']; ?></td>
            <td class="text-center"><?php echo get_status($documenttype_details_row['status']); ?></td>
            <?php $document_id = core_encrypt($documenttype_details_row['id']); ?>
            <td class="text-center">
              <p style="color:#CE232B !important;" onclick="onClickEdit('<?php echo $document_id; ?>')">
                <span class="glyphicon glyphicon-edit"></span>
              </p>
            </td>
            <!-- <td class="text-center"><a style="color:#CE232B !important;" onclick="DeleteDocumentType('<?php echo $document_id; ?>')">
              <span class="glyphicon glyphicon-remove" ></span></a>
            </td> -->
          </tr>
        <?php 
        endwhile;
      endif;?>
        </tbody>
        </table>
  </div>
</div>
</html>
<!-- add document type -->
<div id="addDocumentTypeModal" class="modal fade">
    <div class="modal-dialog modal-md" style="margin-top:18%;">
        <div class="modal-content">
        </div>
    </div>
</div>
<!-- edit document type -->
<div id="editDocumentTypeModal" class="modal fade">
    <div class="modal-dialog modal-md" style="margin-top:18%;">
        <div class="modal-content">
        </div>
    </div>
</div>