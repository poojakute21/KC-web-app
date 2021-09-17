<?php
$verification_details = "select a.*,b.request_status_id from ".request_details." a INNER JOIN ".request_details_delivery." b
ON a.id= b.request_id WHERE request_status_id IN (11) AND is_duplicated='Y'";
$verification_details_res = mysqli_query($conn,$verification_details) or die(mysqli_error($conn));

?>
<html>
<script>
$(document).ready(function() {
    
    $('.table-bordered').DataTable( {
        "scrollX": true
    } );
    //window.location.reload();
    //swal("Something went wrong","verification not Updated","error");
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

  $('#actionStatus').on('click',function (e) {
    if($(this).prop("checked") == true){
        var status = 'Y';
        var id= $(this).val();
    }else{
        var status = 'N';
        var id= $(this).val();
    }
    $.ajax({
            url : WEBSITE + 'ajax_index.php?page=ajax_files/verification_ajax',
            type: 'POST',
            data:{'type' : 'updateDuplication' , 'status' : status,'id' : id},
            success:function(response){
                console.log(response);
                window.location.reload();
                          
                //var resObj = JSON.parse(response);
                //alert(response);
                // if(resObj.result == "success"){
                //     swal({
                //         title: "Success",
                //         text: "Scheduling Updated Successfully",
                //         type: "success",
                //         confirmButtonColor: "#DD6B55",
                //         confirmButtonText: "Ok",
                //         closeOnConfirm: true
                //     })
                //     .then((isConfirm) => {
                //         if (isConfirm) {
                //             window.location = WEBSITE + 'main.php?page=scheduling/scheduling';
                        
                //         } 
                //     });
                // }else{
                //     swal("Something went wrong","Scheduling not Updated","error");
                //     window.location.reload();
                // }
                
            }
        });
  });


});

var WEBSITE = "<?php echo WEBSITE; ?>";

</script>
<div class="panel panel-primary">
  <div class="panel-heading">
    <b>Deuplication Details</b>
   
  </div>
  
  <div class="panel-body">
    <table class="table table-bordered dt-responsive nowrap dataTable no-footer">
        <thead>
          <tr>
            <th class="text-center">Sr no.</th>
            <th class="text-center">Channel</th>
            <th class="text-center">Name</th>
            <th class="text-center">Address</th>
            <th class="text-center">Email</th>
            <th class="text-center">Contact No</th>
            <th class="text-center">Document Type</th>
            <th class="text-center">Document No</th>
            <th class="text-center">No Of People</th>
            <th class="text-center">Aid Form</th>
            <th class="text-center">Request Type</th>
            <th class="text-center">Accepted/Rejected</th>
            <th class="text-center">Action</th>
            <!-- <th class="text-center">Delete</th> -->
          </tr>
        </thead>
        <tbody>
        <?php
        if(mysqli_num_rows($verification_details_res) > 0):
        while($verification_details_row = mysqli_fetch_array($verification_details_res)):?>
          <tr>
            <td class="text-center"><?php echo $verification_details_row['id']; ?></td>
            <td class="text-center"><?php echo get_channelname($verification_details_row['channel_id']); ?></td>
            <td class="text-center"><?php echo $verification_details_row['name']; ?></td>
            <td class="text-center"><?php echo $verification_details_row['address']; ?></td>
            <td class="text-center"><?php echo $verification_details_row['email']; ?></td>
            <td class="text-center"><?php echo $verification_details_row['contact_no']; ?></td>
            <td class="text-center"><?php echo get_documenttype($verification_details_row['document_id']); ?></td>
            <td class="text-center"><?php echo $verification_details_row['document_no']; ?></td>
            <td class="text-center"><?php echo $verification_details_row['no_of_people']; ?></td>
            <td class="text-center"><?php echo get_requesttype($verification_details_row['aid_form']); ?></td>
            <td class="text-center"><?php echo strtoupper($verification_details_row['request_type']); ?></td>
            <td class="text-center"><?php echo get_requeststatus($verification_details_row['request_status_id']); ?></td>
            <?php $verification_id = core_encrypt($verification_details_row['id']); ?>
            <td class="text-center">
                <label class="switch">
                    <input type="checkbox" id="actionStatus" value="<?php echo $verification_id;?>">
                    <span class="slider"></span>
                </label>
                <!-- <a style="color:#CE232B !important;" href="<?php echo WEBSITE . "main.php?page=verifications/edit_verification_modal&id=" . $verification_id;  ?>">
            <span class="glyphicon glyphicon-edit"></span></a> -->
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
