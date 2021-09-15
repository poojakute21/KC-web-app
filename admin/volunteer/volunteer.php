<?php
$volunteer_details = "select * from ".volunteers_details;
$volunteer_details_res = mysqli_query($conn,$volunteer_details) or die(mysqli_error($conn));

?>
<html>
<script>
$(document).ready(function() {
    $('.table-bordered').DataTable();
    //window.location.reload();
    //swal("Something went wrong","Volunteer not Updated","error");
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

function Deletevolunteer(volunteer_id){
  $.ajax({
            url:WEBSITE + 'ajax_index.php?page=ajax_files/admin_ajax',
            type:'POST',
            data: {'volunteer_id' : volunteer_id, 'type' : 'deletevolunteer'},
            success:function(response){
                //alert(response);
                var resObj = JSON.parse(response);
                if(resObj.result == "success"){
                  swal({
                        title: "Success",
                        text: "Volunteer Deleted Successfully",
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
                    //alert('Volunteer Not Deleted');
                    swal("Something went wrong","Volunteer not Deleted","error");
                    window.location.reload();
                    //swal("Something went wrong","Volunteer not Updated","error");
                }
            }
        });
}
var WEBSITE = "<?php echo WEBSITE; ?>";

</script>
<div class="panel panel-primary">
  <div class="panel-heading">
    <b>Volunteer Details</b>
    <a style="margin-left: 70%;" href="<?php echo WEBSITE . "ajax_index.php?page=admin/volunteer/add_volunteer_modal";  ?>" data-toggle="modal" data-target="#addvolunteerModal">
            Add Volunteer Type</a>
  </div>
  
  <div class="panel-body">
    <table class="table table-bordered dt-responsive nowrap dataTable no-footer">
        <thead>
          <tr>
            <th class="text-center">Sr no.</th>
            <th class="text-center">Name</th>
            <th class="text-center">Email</th>
            <th class="text-center">Contact No.</th>
            <th class="text-center">Role Name</th>
            <th class="text-center">Status</th>
            <th class="text-center">Edit</th>
            <!-- <th class="text-center">Delete</th> -->
          </tr>
        </thead>
        <tbody>
        <?php
        if(mysqli_num_rows($volunteer_details_res) > 0):
        while($volunteer_details_row = mysqli_fetch_array($volunteer_details_res)):?>
          <tr>
            <td class="text-center"><?php echo $volunteer_details_row['id']; ?></td>
            <td class="text-center"><?php echo $volunteer_details_row['name']; ?></td>
            <td class="text-center"><?php echo $volunteer_details_row['email']; ?></td>
            <td class="text-center"><?php echo $volunteer_details_row['contact_no']; ?></td>
            <td class="text-center"><?php echo get_rolename($volunteer_details_row['role_id']); ?></td>
            <td class="text-center"><?php echo get_status($volunteer_details_row['status']); ?></td>
            <?php $volunteer_id = core_encrypt($volunteer_details_row['id']); ?>
            <td class="text-center"><a style="color:#CE232B !important;" href="<?php echo WEBSITE . "ajax_index.php?page=admin/volunteer/edit_volunteer_modal&id=" . $volunteer_id;  ?>" data-toggle="modal" data-target="#editvolunteerModal">
            <span class="glyphicon glyphicon-edit"></span></a>
            </td>
            <!--<td class="text-center"><a style="color:#CE232B !important;" onclick="Deletevolunteer('<?php echo $volunteer_id; ?>')">
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
<!-- add Volunteer -->
<div id="addvolunteerModal" class="modal fade">
    <div class="modal-dialog modal-md" style="margin-top:18%;">
        <div class="modal-content">
        </div>
    </div>
</div>
<!-- edit Volunteer -->
<div id="editvolunteerModal" class="modal fade">
    <div class="modal-dialog modal-md" style="margin-top:18%;">
        <div class="modal-content">
        </div>
    </div>
</div>