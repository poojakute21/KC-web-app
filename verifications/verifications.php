<?php
$verification_details = "select a.*,b.verification_status,b.scheduling_status,b.delivery_status,b.scheduling_date,b.verification_date,b.delivery_set_date from ".request_details." a INNER JOIN ".request_details_delivery." b
ON a.id= b.request_id";

if(isset($_POST['submit'])){

  $request_type = $_POST['request_type'];
  $level = $_POST['level'];
  $status = $_POST['status'];
  $date = $_POST['filter_date'];

  if(!empty($request_type)){
    $verification_details .= " and a.request_type = '$request_type'";
  }

  if(!empty($level) && !empty($status)){

    if($level == 'verification'){
      $verification_details .= " and b.verification_status = '".$status."'";
    }
    else if($level == 'schedule'){
      $verification_details .= " and b.scheduling_status = '".$status."'";
    }
    else if($level == 'delivery'){
      $verification_details .= " and b.delivery_status = '".$status."'";
    }
    
  }

  if(!empty($date) && trim(' ',$date)){
    $verification_details .= " and  a.created_at =".$date;
  } 

  // print_r($verification_details);exit;
}

$verification_details_res = mysqli_query($conn,$verification_details) or die(mysqli_error($conn));

?>
<html>
<script>
$(document).ready(function() {
    
    // $('#datetimepicker1').datetimepicker();

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
  <form method="POST" enctype="multipart/form-data" action="<?php echo WEBSITE . 'ajax_index.php?page=ajax_files/upload_bulkdata'; ?>" >
  
    <div class="panel-heading">
      <b>Upload WhatsApp Data</b>
    </div>
    <div class="panel-body">

      <label> Upload Whatsapp Bot Data : </label><label> <a href="<?php echo WEBSITE . "sample_excel/bulk_request_details.csv"; ?>" >Download Format Here</a></label>
      <div class="row">
        <input type="file" name="whatsappFile" class="form-control">
        <input type="submit" style="margin-left:2%; " name="whatsappFileSubmit" value="Submit" class="btn btn-success">
      </div>
    </div>
  </form>
</div>
<div class="panel panel-primary">
  <div class="panel-heading">
    <b>verification Details</b>
    <a class="menu-list" style="margin-left: 70%;" href="<?php echo WEBSITE . "main.php?page=verifications/add_verifications_modal";  ?>">
            Add Details</a>
  </div>
  <div class="form-group" style="margin-left:20px;margin-top:20px;">
       <span>
           <img src="<?php echo WEBSITE . 'images/yBlink.gif'; ?>"> Pending
       </span>
       <span style="padding-left:20px;">
           <img src="<?php echo WEBSITE . 'images/g.png'; ?>"> Completed
       </span>
       <span style="padding-left:20px;">
           <img src="<?php echo WEBSITE . 'images/r.png'; ?>"> Rejected
       </span>
  </div>

  <!-- Filter Drop down -->
  <?php require_once(ABSPATH.'includes/filter.php'); ?>
  <!-- Filter drop end  -->

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
            <th class="text-center">Verification</th>
            <th class="text-center">Verification Date</th>
            <th class="text-center">Scheduling</th>
            <th class="text-center">Scheduling Date</th>
            <th class="text-center">Delivery</th>
            <th class="text-center">Delivery Date</th>
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
            <?php $verification_id = core_encrypt($verification_details_row['id']); ?>
            <td class="text-center"><?php 
             if($verification_details_row['verification_status'] == "P"):
                ?>
                <a style="color:#CE232B !important;" href="<?php echo WEBSITE . "main.php?page=verifications/edit_verification_modal&id=" . $verification_id;  ?>">
              <img src="<?php echo WEBSITE . 'images/yBlink.gif'; ?>" border="0" /></a>
              <?php
              elseif($verification_details_row['verification_status'] == "N"):
                ?>
                <img src="<?php echo WEBSITE . 'images/r.png'; ?>" border="0" />
                <?php
              elseif($verification_details_row['verification_status'] == "Y"):
                ?>
                 <img src="<?php echo WEBSITE . 'images/g.png'; ?>" border="0" />
              <?php else: ?>
                <img src="<?php echo WEBSITE . 'images/gy.png'; ?>" border="0" />
              <?php endif; ?>
              
            </td>
            <td class="text-center">
              <?php 
              if($verification_details_row['verification_date'] !=''){
                  echo  $verification_details_row['verification_date'];
              }else{
                echo "-";
              }; 
              ?>
            </td>
            <td class="text-center"><?php 
             if( ($verification_details_row['verification_status'] == "Y" or $verification_details_row['verification_status'] == "P") and $verification_details_row['scheduling_status'] == "P" ):
             
                ?>
                <img src="<?php echo WEBSITE . 'images/yBlink.gif'; ?>" border="0" />
              <?php
              elseif($verification_details_row['verification_status'] == "Y" and $verification_details_row['scheduling_status'] == "N"):
               
               ?>
                <img src="<?php echo WEBSITE . 'images/r.png'; ?>" border="0" />
                <?php
               elseif($verification_details_row['verification_status'] == "Y" and $verification_details_row['scheduling_status'] == "Y"):
                ?>
                 <img src="<?php echo WEBSITE . 'images/g.png'; ?>" border="0" />
              <?php else: ?>
                <img src="<?php echo WEBSITE . 'images/gy.png'; ?>" border="0" />
              <?php endif; ?>
            </td>
            <td class="text-center">
              <?php 
              if($verification_details_row['scheduling_date'] !=''){
                  echo  $verification_details_row['scheduling_date'];
              }else{
                echo "-";
              }; 
              ?>
            </td>
            <td class="text-center"><?php 
             if( ($verification_details_row['scheduling_status'] == "Y" or $verification_details_row['scheduling_status'] == "P")  and $verification_details_row['delivery_status'] == "P" ):
             
                ?>
                <img src="<?php echo WEBSITE . 'images/yBlink.gif'; ?>" border="0" />
              <?php
              elseif($verification_details_row['scheduling_status'] == "Y" and $verification_details_row['delivery_status'] == "N"):
               
               ?>
                <img src="<?php echo WEBSITE . 'images/r.png'; ?>" border="0" />
                <?php
               elseif($verification_details_row['scheduling_status'] == "Y" and $verification_details_row['delivery_status'] == "Y"):
                ?>
                 <img src="<?php echo WEBSITE . 'images/g.png'; ?>" border="0" />
              <?php else: ?>
                <img src="<?php echo WEBSITE . 'images/gy.png'; ?>" border="0" />
              <?php endif; ?>
            </td>
            <td class="text-center">
              <?php 
              if($verification_details_row['delivery_set_date'] !=''){
                  echo  $verification_details_row['delivery_set_date'];
              }else{
                echo "-";
              }; 
              ?>
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
