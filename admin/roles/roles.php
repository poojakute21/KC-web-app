<?php
$role_details = "select * from ".roles;
$role_details_res = mysqli_query($conn,$role_details) or die(mysqli_error($conn));

?>
<html>
<script type="text/javascript" src="<?php echo WEBSITE . 'js/admin/admin_view.js'; ?>"></script>
<script>
$(document).ready(function() {
    $('.table-bordered').DataTable();
    //window.location.reload();
    //swal("Something went wrong","Role not Updated","error");
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

function Deleterole(role_id){
  $.ajax({
            url:WEBSITE + 'ajax_index.php?page=ajax_files/admin_ajax',
            type:'POST',
            data: {'role_id' : role_id, 'type' : 'deleterole'},
            success:function(response){
                //alert(response);
                var resObj = JSON.parse(response);
                if(resObj.result == "success"){
                  swal({
                        title: "Success",
                        text: "Role Deleted Successfully",
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
                    //alert('Role Not Deleted');
                    swal("Something went wrong","Role not Deleted","error");
                    window.location.reload();
                    //swal("Something went wrong","Role not Updated","error");
                }
            }
        });
}
var WEBSITE = "<?php echo WEBSITE; ?>";

</script>
<div class="panel panel-primary">
  <div class="panel-heading">
    <b>Role Details</b>
    <a style="margin-left: 70%;" href="<?php echo WEBSITE . "ajax_index.php?page=admin/role/add_role_modal";  ?>" data-toggle="modal" data-target="#addroleModal">
            Add Role Type</a>
  </div>
  
  <div class="panel-body">
    <table class="table table-bordered dt-responsive nowrap dataTable no-footer">
        <thead>
          <tr>
            <th class="text-center">Role ID</th>
            <th class="text-center">Role Name</th>
            <th class="text-center">Role Status</th>
            <th class="text-center">Edit</th>
            <!-- <th class="text-center">Delete</th> -->
          </tr>
        </thead>
        <tbody>
        <?php
        if(mysqli_num_rows($role_details_res) > 0):
        while($role_details_row = mysqli_fetch_array($role_details_res)):?>
          <tr>
            <td class="text-center"><?php echo $role_details_row['id']; ?></td>
            <td class="text-center"><?php echo $role_details_row['name']; ?></td>
            <td class="text-center"><?php echo $role_details_row['status']; ?></td>
            <?php $role_id = core_encrypt($role_details_row['id']); ?>
            <td class="text-center"><a style="color:#CE232B !important;" href="<?php echo WEBSITE . "ajax_index.php?page=admin/role/edit_role_modal&id=" . $role_id;  ?>" data-toggle="modal" data-target="#editroleModal">
            <span class="glyphicon glyphicon-edit"></span></a>
            </td>
            <!--<td class="text-center"><a style="color:#CE232B !important;" onclick="Deleterole('<?php echo $role_id; ?>')">
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
<!-- add Role -->
<div id="addroleModal" class="modal fade">
    <div class="modal-dialog modal-md" style="margin-top:18%;">
        <div class="modal-content">
        </div>
    </div>
</div>
<!-- edit Role -->
<div id="editroleModal" class="modal fade">
    <div class="modal-dialog modal-md" style="margin-top:18%;">
        <div class="modal-content">
        </div>
    </div>
</div>