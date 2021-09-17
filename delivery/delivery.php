<?php
$verification_details = "select a.id,b.request_status_id from ".request_details." a INNER JOIN ".request_details_delivery." b
ON a.id= b.request_id WHERE request_status_id IN (1,9,10)";
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


});

var WEBSITE = "<?php echo WEBSITE; ?>";

</script>
<div class="panel panel-primary">
  <div class="panel-heading">
    <b>Delivery Details</b>
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
            <th class="text-center">No Of Kits</th>
            <th class="text-center">Aid Form</th>
            <th class="text-center">Request Type</th>
            <th class="text-center">Status</th>
            <th class="text-center">Delivery</th>
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
            <td class="text-center"><?php echo $verification_details_row['approve_people_count']; ?></td>
            <td class="text-center"><?php echo get_requesttype($verification_details_row['aid_form']); ?></td>
            <td class="text-center"><?php echo strtoupper($verification_details_row['request_type']); ?></td>
            <td class="text-center"><?php echo get_requeststatus($verification_details_row['request_status_id']); ?></td>
            <?php $verification_id = core_encrypt($verification_details_row['id']); ?>
            <td class="text-center">
                <?php  if($verification_details_row['request_status_id'] == 10){
                    echo "-";
                }else{ ?>
                <a style="color:#CE232B !important;" href="<?php echo WEBSITE . "ajax_index.php?page=delivery/edit_delivery_modal&id=" . $verification_id;  ?>" data-toggle="modal" data-target="#editvolunteerModal">
                </a>
                <?php } ?>
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
<div id="editvolunteerModal" class="modal fade">
    <div class="modal-dialog modal-md" style="margin-top:18%;">
        <div class="modal-content">
        </div>
    </div>
</div>