<?php
//Request Details Start Here
if($_POST['type'] == "addvolunteer"){ //if add submit

  $parsedData = array();

  $addData = $_POST['aData'];
  //print_r($addData);
  parse_str($addData,$parsedData);
  
  $volunteerName = $parsedData['volunteerName'];
  $volunteerEmail = $parsedData['volunteerEmail'];
  $volunteerContact = $parsedData['volunteerContact'];
  $volunteerBirthdate = date("Y-m-d", strtotime($parsedData['volunteerBirthdate']));
  $volunteerAddress = $parsedData['volunteerAddress'];
  $volunteerRole = $parsedData['volunteerRole'];
  $volunteerStatus = $parsedData['volunteerStatus'];
  $volunteerPassword = md5('khaana@123');
  $addedby = $_SESSION['roleid'];
  
  
  $check_query = mysqli_query($conn, "SELECT name from ".volunteers_details." where email = '". $volunteerEmail."'") or die("mysql Error Occured");

  if(mysqli_num_rows($check_query) > 0){

    echo json_encode(array('result'=>'same'));
    exit;

  }else{

   $query = "INSERT INTO ".volunteers_details." (`role_id`, `added_by`, `name`, `email`,`password`, `contact_no`, `address`, `date_of_birth`, `status`, `created_at`) VALUES ('$volunteerRole','$addedby','$volunteerName','$volunteerEmail','$volunteerPassword','$volunteerContact','$volunteerAddress','$volunteerBirthdate','$volunteerStatus','now()')";

    mysqli_query($conn, $query) or die(mysqli_error($conn));

    if(mysqli_affected_rows($conn) > 0){

      echo json_encode(array('result'=>'success'));
      exit;

    }else{
      echo json_encode(array('result'=>'failed'));
      exit;
    }
  }



}

if($_POST['type'] == "updatevolunteer"){
    $parsedData = array();
  
    $addData = $_POST['uData'];
    parse_str($addData,$parsedData);
     $volunteerId = core_decrypt($parsedData['volunteerId']);
     $volunteerName = $parsedData['volunteerName'];
     $volunteerEmail = $parsedData['volunteerEmail'];
     $volunteerContact = $parsedData['volunteerContact'];
     $volunteerBirthdate = date("Y-m-d", strtotime($parsedData['volunteerBirthdate']));
     $volunteerAddress = $parsedData['volunteerAddress'];
     $volunteerRole = $parsedData['volunteerRole'];
     $volunteerStatus = $parsedData['volunteerStatus'];
     $volunteerPassword = md5('khaana@123');
     $addedby = $_SESSION['roleid'];
    $role_details = "UPDATE ".volunteers_details." SET `role_id` ='$volunteerRole',`name` = '$volunteerName',`email`='$volunteerEmail',`contact_no`='$volunteerContact',`address`='$volunteerAddress',`date_of_birth`='$volunteerBirthdate',`status` = '$volunteerStatus',`updated_at`='now()' where `id` = '$volunteerId'";
    
   mysqli_query($conn,$role_details) or die(mysqli_error($conn));
  
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