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
  $progressStatus = "P";

  $check_query = mysqli_query($conn, "SELECT name,id from ".request_details." where name='".$fullName."'
  AND contact_no = '". $contactNumber."'") or die("mysql Error Occured");
  if(mysqli_num_rows($check_query)){
    $check_query_res = mysqli_fetch_assoc($check_query);
    $check_details_query= mysqli_query($conn, "SELECT id from ".request_details_delivery." WHERE delivery_status='Y' AND request_id='".$check_query_res['id']."'");
    if(mysqli_num_rows($check_details_query)){

      $query_details = mysqli_query($conn, "UPDATE ".request_details_delivery." SET verification_status='P',
      varification_by='',scheduling_status='P',
      scheduling_by='',delivery_status='P',delivery_set_by='' WHERE request_id='".$check_query_res['id']."'") or die("mysql Error Occured");;
      
        echo json_encode(array('result'=>'success'));
        exit;
      }else{
        echo json_encode(array('result'=>'same'));
        exit;
      }
  }else{

   $query = "INSERT INTO ".request_details." (`document_id`, `channel_id`, `name`, `address`, 
   `contact_no`, `document_no`, `email`, `no_of_people`, `is_beneficiary`, `aid_form`, 
   `request_type`,`created_at`)
    VALUES ('$documentType','$channelType','$fullName','$verificationAddress','$contactNumber',
    '$documentNumber','$emailAddress','$noofPeople','$isBeneficiary','$aidform','$requestType',
    'now()')";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    $last_id = mysqli_insert_id($conn);

    $query_details = "INSERT INTO ".request_details_delivery." (`request_id`,`verification_status`,`user_id`) 
    VALUES ('$last_id','$progressStatus','$userid')";
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
    $userid =  $_SESSION['userid'];

    $check_query = mysqli_query($conn, "SELECT verification_date from ".request_details_delivery." where `id` = '".$verificationId."'") or die("mysql Error Occured");
    $check_query_res = mysqli_fetch_assoc($check_query);
    if($check_query_res['verification_date'] != ''){
      $verification_date =  $check_query_res['verification_date'].",".date("Y-m-d");
    }else{
      $verification_date = date("Y-m-d");
    } 
    $role_details = "UPDATE ".request_details." SET document_id='".$documentType."',name='".$fullName."',address='".$verificationAddress."',contact_no='".$contactNumber."',document_no='".$documentNumber."',
    email='".$emailAddress."',no_of_people='".$noofPeople."',is_beneficiary='".$isBeneficiary."',
    aid_form='".$aidform."', updated_at='now()' where `id` = '".$verificationId."'";
    mysqli_query($conn,$role_details) or die(mysqli_error($conn));
    
   $query_details = "UPDATE ".request_details_delivery." SET verification_status='".$progressStatus."',
    verification_date='".$verification_date."',varification_by='".$userid."' WHERE request_id='".$verificationId."'";
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

//Scheduling Start Here
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
  $userid =  $_SESSION['userid'];
 
  $check_query = mysqli_query($conn, "SELECT scheduling_date from ".request_details_delivery." where `id` = '".$verificationId."'") or die("mysql Error Occured");
    $check_query_res = mysqli_fetch_assoc($check_query);
    if($check_query_res['scheduling_date'] != ''){
      $scheduling_date =  $check_query_res['scheduling_date'].",".date("Y-m-d");
    }else{
      $scheduling_date = date("Y-m-d");
    } 
    
 $query_details = "UPDATE ".request_details_delivery." SET approve_people_count='".$approvedKits."',delivery_scheduled_on='".$scheduledOn."',
 delivery_pickup_point='".$pickupPoint."',scheduling_status='".$progressStatus."',scheduling_date='".$scheduling_date."',
 scheduling_by='".$userid."',scheduling_remark='".$remarks."' 
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
//Scheduling End Here

//Delivery Start Here
if($_POST['type'] == "updateDelivery"){
  $parsedData = array();

  $addData = $_POST['uData'];
  parse_str($addData,$parsedData);
  //print_r($parsedData);
  $verificationId = core_decrypt($parsedData['verificationId']);
  $deliveredtoName = $parsedData['deliveredtoName'];
  $deliveredLocation = $parsedData['deliveredLocation'];
  $deliveredtoContact = $parsedData['deliveredtoContact'];
  $deliveredBy = $parsedData['deliveredBy'];
  $deliveredOn = date("Y-m-d", strtotime($parsedData['deliveredOn']));
  $deliveredbyContact = $parsedData['deliveredbyContact'];
  $progressStatus = $parsedData['progressStatus'];
  $remarks = $parsedData['remarks'];
  $userid =  $_SESSION['userid'];

  $check_query = mysqli_query($conn, "SELECT delivery_set_date from ".request_details_delivery." where `id` = '".$verificationId."'") or die("mysql Error Occured");
  $check_query_res = mysqli_fetch_assoc($check_query);
  if($check_query_res['delivery_set_date'] != ''){
    $delivery_set_date =  $check_query_res['delivery_set_date'].",".date("Y-m-d");
  }else{
      $delivery_set_date = date("Y-m-d");
    } 
 
 $query_details = "UPDATE ".request_details_delivery." SET delivered_to='".$deliveredtoName."',delivery_location='".$deliveredLocation."',
 delivered_to_contact='".$deliveredtoContact."',delivered_by='".$deliveredBy."',delivery_status='".$progressStatus."',
 delivery_set_date='".$delivery_set_date."',delivery_set_by='".$userid."',delivered_by_contact='".$deliveredbyContact."',
 delivered_on='".$deliveredOn."',delivery_remark='".$remarks."',
 last_updated_on='now()' WHERE request_id='".$verificationId."'";
  mysqli_query($conn, $query_details) or die(mysqli_error($conn));

    if(mysqli_affected_rows($conn) > 0){
      echo json_encode(array('result'=>'success'));
      exit;

    }else{
      echo json_encode(array('result'=>'failed'));
      exit;
    }

}

//Delivery End Here
?>