<?php
//Request Details Start Here
if($_POST['type'] == "adddetails"){ //if add submit

  $parsedData = array();

  $addData = $_POST['aData'];
  //print_r($addData);
  parse_str($addData,$parsedData);
  
  $fullName = $parsedData['fullName'];
  $verificationAddress = $parsedData['verificationAddress'];
  $emailAddress = $parsedData['emailAddress'];
  $contactNumber = $parsedData['contactNumber'];
  $channelType = "4";
  $documentType = $parsedData['documentType'];
  $documentNumber = $parsedData['documentNumber'];
  $noofPeople = $parsedData['noofPeople'];
  $isBeneficiary = $parsedData['isBeneficiary'];
  $aidform = $parsedData['aidform'];
  
  if($noofPeople > 20){
    $requestType = "bulk";
  }else{
      $requestType ="single";
  }
  
  $userid=  $_SESSION['userid'];
  $requestStatusid = "5";
  $check_query = mysqli_query($conn, "SELECT name from ".request_details." where document_no = '". $documentNumber."'") or die("mysql Error Occured");

  if(mysqli_num_rows($check_query) > 0){

    echo json_encode(array('result'=>'same'));
    exit;

  }else{

   $query = "INSERT INTO ".request_details." (`document_id`, `channel_id`, `name`, `address`, 
   `contact_no`, `document_no`, `email`, `no_of_people`, `is_beneficiary`, `aid_form`, 
   `request_type`,`created_at`)
    VALUES ('$documentType','$channelType','$fullName','$verificationAddress','$contactNumber',
    '$documentNumber','$emailAddress','$noofPeople','$isBeneficiary','$aidform','$requestType',
    'now()')";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    $last_id = mysqli_insert_id($conn);

    $query_details = "INSERT INTO ".request_details_delivery." (`request_id`,`request_status_id`,`user_id`) 
    VALUES ('$last_id','$requestStatusid','$userid')";
    mysqli_query($conn, $query_details) or die(mysqli_error($conn));

    if(mysqli_affected_rows($conn) > 0){
        
      echo json_encode(array('result'=>'success'));
      exit;

    }else{
      echo json_encode(array('result'=>'failed'));
      exit;
    }
  }



}

if($_POST['type'] == "updateverification"){
    $parsedData = array();
  
    $addData = $_POST['uData'];
    parse_str($addData,$parsedData);
    $verificationId = core_decrypt($parsedData['verificationId']);
    $fullName = $parsedData['fullName'];
    $verificationAddress = $parsedData['verificationAddress'];
    $emailAddress = $parsedData['emailAddress'];
    $contactNumber = $parsedData['contactNumber'];
    $documentType = $parsedData['documentType'];
    $documentNumber = $parsedData['documentNumber'];
    $noofPeople = $parsedData['noofPeople'];
    $isBeneficiary = $parsedData['isBeneficiary'];
    $aidform = $parsedData['aidform'];
    $progressStatus= $parsedData['progressStatus'];
    $userid=  $_SESSION['userid'];
    
  
  $role_details = "UPDATE ".request_details." SET document_id='".$documentType."',name='".$fullName."',
  address='".$verificationAddress."',contact_no='".$contactNumber."',document_no='".$documentNumber."',
  email='".$emailAddress."',no_of_people='".$noofPeople."',is_beneficiary='".$isBeneficiary."',
  aid_form='".$aidform."',updated_at='now()' where `id` = '".$verificationId."'";
    
   mysqli_query($conn,$role_details) or die(mysqli_error($conn));
  
   $query_details = "UPDATE ".request_details_delivery." SET request_status_id='".$progressStatus."' WHERE request_id='".$verificationId."'";
    mysqli_query($conn, $query_details) or die(mysqli_error($conn));

      if(mysqli_affected_rows($conn) > 0){
        echo json_encode(array('result'=>'success'));
        exit;
  
      }else{
        echo json_encode(array('result'=>'failed'));
        exit;
      }
  
}

if($_POST['type'] == "updateScheduling"){
  $parsedData = array();

  $addData = $_POST['uData'];
  parse_str($addData,$parsedData);
  //print_r($parsedData);
  $verificationId = core_decrypt($parsedData['verificationId']);
  $approvedKits = $parsedData['approvedKits'];
  $scheduledOn = date("Y-m-d", strtotime($parsedData['scheduledOn']));
  $pickupPoint = $parsedData['pickupPoint'];
  $progressStatus = $parsedData['progressStatus'];
  $remarks = $parsedData['remarks'];

 
 $query_details = "UPDATE ".request_details_delivery." SET approve_people_count='".$approvedKits."',delivery_scheduled_on='".$scheduledOn."',
 delivery_pickup_point='".$pickupPoint."',request_status_id='".$progressStatus."',scheduling_remark='".$remarks."' 
 WHERE request_id='".$verificationId."'";
mysqli_query($conn, $query_details) or die(mysqli_error($conn));

    if(mysqli_affected_rows($conn) > 0){
      echo json_encode(array('result'=>'success'));
      exit;

    }else{
      echo json_encode(array('result'=>'failed'));
      exit;
    }

}

//Request Details Status End Here

?>