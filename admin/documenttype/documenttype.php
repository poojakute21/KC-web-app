<?php
$documenttype_details = "select * from ".document_type;
$documenttype_details_res = mysqli_query($conn,$documenttype_details) or die(mysqli_error($conn));

?>
<html>
<script>
$(document).ready(function() {
    $('.table-bordered').DataTable();

    
  $('.glyphicon-edit').on('click', function (e) {
      var $t = $(this),
          target = $t[0].href || $t.data("target") || $t.parents('.modal') || [];

    $(target)
      .find("input,textarea,select")
        .val('')
        .end()
      .find("input[type=checkbox], input[type=radio]")
        .prop("checked", "")
        .end();
  })


});

function DeleteDocumentType(document_id ){
  $.ajax({
            url:WEBSITE + 'ajax_index.php?page=ajax_files/admin_ajax',
            type:'POST',
            data: {'document_id ' : document_id , 'type' : 'deleteDocumentType'},
            success:function(response){
                //alert(response);
                var resObj = JSON.parse(response);
                if(resObj.result == "success"){
                    alert('Document Type Deleted Successfully');
                   location.reload();
                
                }else if(resObj.result == "same"){
                    
                    alert('Document Type Already Exits');
                    location.reload();
                
                }else{
                  swal("Something went wrong","Document Type not Deleted","error");
                    
                   location.reload();
                    //swal("Something went wrong","Channel not Updated","error");
                }
            }
        });
}
var WEBSITE = "<?php echo WEBSITE; ?>";

</script>
<div class="panel panel-primary">
  <div class="panel-heading">
    <b>Document Type Details</b>
    <a style="margin-left: 70%;" href="<?php echo WEBSITE . "ajax_index.php?page=admin/documenttype/add_document_modal";  ?>" data-toggle="modal" data-target="#addDocumentTypeModal">
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
            <td class="text-center"><a style="color:#CE232B !important;" href="<?php echo WEBSITE . "ajax_index.php?page=admin/documenttype/edit_document_modal&id=" . $document_id;  ?>" data-toggle="modal" data-target="#editDocumentTypeModal">
            <span class="glyphicon glyphicon-edit"></span></a>
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