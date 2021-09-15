<?php
$requeststatus_details = "select * from ".request_status;
$requeststatus_details_res = mysqli_query($conn,$requeststatus_details) or die(mysqli_error($conn));

?>
<html>
<script>
$(document).ready(function() {
    $('.table-bordered').DataTable();
    //window.location.reload();
    //swal("Something went wrong","Request Status not Updated","error");
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

function Deleterequeststatus(requeststatus_id){
  $.ajax({
            url:WEBSITE + 'ajax_index.php?page=ajax_files/admin_ajax',
            type:'POST',
            data: {'requeststatus_id' : requeststatus_id, 'type' : 'deleterequeststatus'},
            success:function(response){
                //alert(response);
                var resObj = JSON.parse(response);
                if(resObj.result == "success"){
                  swal({
                        title: "Success",
                        text: "Request Status Deleted Successfully",
                        type: "success",
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Ok",
                        closeOnConfirm: true
                    })
                    .then((isConfirm) => {
                        if (isConfirm) {
                            window.location.reload();
                        } 
                    });                
                }else{
                    //alert('Request Status Not Deleted');
                    swal("Something went wrong","Request Status not Deleted","error");
                    window.location.reload();
                    //swal("Something went wrong","Request Status not Updated","error");
                }
            }
        });
}
var WEBSITE = "<?php echo WEBSITE; ?>";

</script>
<div class="panel panel-primary">
  <div class="panel-heading">
    <b>Request Status Details</b>
    <a style="margin-left: 70%;" href="<?php echo WEBSITE . "ajax_index.php?page=admin/requeststatus/add_requeststatus_modal";  ?>" data-toggle="modal" data-target="#addrequeststatusModal">
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
            <td class="text-center"><a style="color:#CE232B !important;" href="<?php echo WEBSITE . "ajax_index.php?page=admin/requeststatus/edit_requeststatus_modal&id=" . $requeststatus_id;  ?>" data-toggle="modal" data-target="#editrequeststatusModal">
            <span class="glyphicon glyphicon-edit"></span></a>
            </td>
            <!--<td class="text-center"><a style="color:#CE232B !important;" onclick="Deleterequeststatus('<?php echo $requeststatus_id; ?>')">
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