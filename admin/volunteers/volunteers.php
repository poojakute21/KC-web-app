<?php
$volunteers_details = "select a.*,b.role_name from ".volunteers_details." a INNER JOIN ".roles." b on a.roles_id=b.roles_id ";
$volunteers_details_res = mysqli_query($conn,$volunteers_details) or die(mysqli_error($conn));

?>
<html>
<script type="text/javascript" src="<?php echo WEBSITE . 'js/admin/admin_view.js'; ?>"></script>
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

function DeleteVolunteersDetails(volunteers_id){
  $.ajax({
            url:WEBSITE + 'ajax_index.php?page=ajax_files/admin_ajax',
            type:'POST',
            data: {'volunteers_id' : volunteers_id, 'type' : 'deleteVolunteers'},
            success:function(response){
                //alert(response);
                var resObj = JSON.parse(response);
                if(resObj.result == "success"){
                    alert('Volunteers Details Deleted Successfully');
                   location.reload();
                
                }else if(resObj.result == "same"){
                    
                    alert('Volunteers Details Already Exits');
                    location.reload();
                
                }else{
                    alert('Volunteers Details Not Created');
                   location.reload();
                    //swal("Something went wrong","Channel not Updated","error");
                }
            }
        });
}
var WEBSITE = "<?php echo WEBSITE; ?>";

</script>
<!-- add start here -->
<div><!-- container div -->
    <div class="panel panel-primary">
      <div class="panel-heading"><b>Add Volunteers Details</b></div>
      <div class="panel-body">
      <form class="form-inline" method="POST" id="AddForm" name="AddForm">
        <div class="form-group">
          <label> Volunteer Name : </label>
            <input type="text" name="channelName" class="form-control" placeholder="Enter Channel Name">
        </div>
        <div class="form-group">
          <label> Channel Status : </label>&nbsp;&nbsp;
          <input type="radio" name="channelStatus" class="form-control" value="Y"><span class="channelStatus">&nbsp; Active </span>&nbsp;&nbsp;
          <input type="radio" name="channelStatus" class="form-control" value="N"><span class="channelStatus">&nbsp; Inactive </span>&nbsp;&nbsp;
        </div>
        <br/><br/>
        <input type="submit" name="channelAdd" id="channelAdd" value="Add Channel" class="btn btn-danger form-control" >
        </div> <!-- hidden div -->
      </form><br/>
    </div>
  </div>

<!-- add end here -->
<div class="panel panel-primary">
  <div class="panel-heading">
    <b>Volunteers Details</b>
    <!-- <img height="24px" width="24px" src="<?php echo WEBSITE.'images/excel.png' ?>" align="right" title="Download Excel File"></a> -->
  </div>
  
  <div class="panel-body">
    <table class="table table-bordered dt-responsive nowrap dataTable no-footer">
        <thead>
          <tr>
            <th class="text-center">Volunteer ID</th>
            <th class="text-center">Role Name</th>
            <th class="text-center">Full Name</th>
            <th class="text-center">Contact No.</th>
            <th class="text-center">Email Id</th>
            <th class="text-center">Address</th>
            <th class="text-center">DOB</th>
            <th class="text-center">Volunteer Status</th>
            <th class="text-center">Edit</th>
            <th class="text-center">Delete</th>
          </tr>
        </thead>
        <tbody>
        <?php
        if(mysqli_num_rows($volunteers_details_res) > 0):
        while($volunteers_details_row = mysqli_fetch_array($volunteers_details_res)):?>
          <tr>
          <php //print_r($channel_details_row);?>
            <td class="text-center"><?php echo $volunteers_details_row['volunteers_id']; ?></td>
            <td class="text-center"><?php echo $volunteers_details_row['role_name']; ?></td>
            <td class="text-center"><?php echo $volunteers_details_row['full_name']; ?></td>
            <td class="text-center"><?php echo $volunteers_details_row['contact_no']; ?></td>
            <td class="text-center"><?php echo $volunteers_details_row['email_id']; ?></td>
            <td class="text-center" style="white-space: pre-wrap !important;"><?php echo $volunteers_details_row['address']; ?></td>
            <td class="text-center"><?php echo $volunteers_details_row['date_of_birth']; ?></td>
            <td class="text-center"><?php echo $volunteers_details_row['volunteers_status']; ?></td>
            <?php $volunteers_id = core_encrypt($volunteers_details_row['volunteers_id']); ?>
            <td class="text-center"><a style="color:#CE232B !important;" href="<?php echo WEBSITE . "ajax_index.php?page=admin/channel/edit_channel_modal&id=" . $volunteers_id;  ?>" data-toggle="modal" data-target="#editVolunteersModal">
            <span class="glyphicon glyphicon-edit"></span></a>
            </td>
            <td class="text-center"><a style="color:#CE232B !important;" onclick="DeleteChannel('<?php echo $volunteers_id; ?>')">
              <span class="glyphicon glyphicon-remove" ></span></a>
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

<!-- edit channel -->
<div id="editVolunteersModal" class="modal fade">
    <div class="modal-dialog modal-md" style="margin-top:18%;">
        <div class="modal-content">
        </div>
    </div>
</div>