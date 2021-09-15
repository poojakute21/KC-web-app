<?php
//Channel Type Start Here
if($_POST['type'] == "addChannel"){ //if add submit

  $parsedData = array();

  $addData = $_POST['aData'];
  //print_r($addData);
  parse_str($addData,$parsedData);
  
  $channelName = $parsedData['channelName'];
  $channelStatus = $parsedData['channelStatus'];

  
  $check_query = mysqli_query($conn, "SELECT name from ".channel_type." where name = '". $channelName."'") or die("mysql Error Occured");

  if(mysqli_num_rows($check_query) > 0){

    echo json_encode(array('result'=>'same'));
    exit;

  }else{

    $query = "INSERT INTO ".channel_type." (`name`,`status`) VALUES ('$channelName','$channelStatus')";
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

if($_POST['type'] == "updateChannel"){
    $parsedData = array();
  
    $addData = $_POST['uData'];
    parse_str($addData,$parsedData);
     $channelId = core_decrypt($parsedData['channelId']);
     $channelName = $parsedData['channelName'];
     $channelStatus = $parsedData['channelStatus'];

    $channel_details = "UPDATE ".channel_type." SET `name` = '$channelName' , `status` = '$channelStatus' where `id` = '$channelId'";
    mysqli_query($conn,$channel_details) or die(mysqli_error($conn));
  
      if(mysqli_affected_rows($conn) > 0){
        echo json_encode(array('result'=>'success'));
        exit;
  
      }else{
        echo json_encode(array('result'=>'failed'));
        exit;
      }
  
}

//Channel Type End Here

//Document Type Start Here
if($_POST['type'] == "addDocument"){ //if add submit

  $parsedData = array();

  $addData = $_POST['aData'];
  //print_r($addData);
  parse_str($addData,$parsedData);
  
  $documentName = $parsedData['documentName'];
  $documentStatus = $parsedData['documentStatus'];

  
  $check_query = mysqli_query($conn, "SELECT name from ".document_type." where name = '". $documentName."'") or die("mysql Error Occured");

  if(mysqli_num_rows($check_query) > 0){

    echo json_encode(array('result'=>'same'));
    exit;

  }else{

    $query = "INSERT INTO ".document_type." (`name`,`status`) VALUES ('$documentName','$documentStatus')";
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

if($_POST['type'] == "updateDocument"){
    $parsedData = array();
  
    $addData = $_POST['uData'];
    parse_str($addData,$parsedData);
     $documentId = core_decrypt($parsedData['documentId']);
     $documentName = $parsedData['documentName'];
     $documentStatus = $parsedData['documentStatus'];

    $document_details = "UPDATE ".document_type." SET `name` = '$documentName' , `status` = '$documentStatus' where `id` = '$documentId'";
    mysqli_query($conn,$document_details) or die(mysqli_error($conn));
  
      if(mysqli_affected_rows($conn) > 0){
        echo json_encode(array('result'=>'success'));
        exit;
  
      }else{
        echo json_encode(array('result'=>'failed'));
        exit;
      }
  
}

//Document Type End Here


//Request Type Start Here
if($_POST['type'] == "addrequesttype"){ //if add submit

  $parsedData = array();

  $addData = $_POST['aData'];
  //print_r($addData);
  parse_str($addData,$parsedData);
  
  $requesttypeName = $parsedData['requesttypeName'];
  $requesttypeStatus = $parsedData['requesttypeStatus'];

  
  $check_query = mysqli_query($conn, "SELECT name from ".request_types." where name = '". $requesttypeName."'") or die("mysql Error Occured");

  if(mysqli_num_rows($check_query) > 0){

    echo json_encode(array('result'=>'same'));
    exit;

  }else{

    $query = "INSERT INTO ".request_types." (`name`,`status`) VALUES ('$requesttypeName','$requesttypeStatus')";
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

if($_POST['type'] == "updaterequesttype"){
    $parsedData = array();
  
    $addData = $_POST['uData'];
    parse_str($addData,$parsedData);
     $requesttypeId = core_decrypt($parsedData['requesttypeId']);
     $requesttypeName = $parsedData['requesttypeName'];
     $requesttypeStatus = $parsedData['requesttypeStatus'];

    $requesttype_details = "UPDATE ".request_types." SET `name` = '$requesttypeName' , `status` = '$requesttypeStatus' where `id` = '$requesttypeId'";
    mysqli_query($conn,$requesttype_details) or die(mysqli_error($conn));
  
      if(mysqli_affected_rows($conn) > 0){
        echo json_encode(array('result'=>'success'));
        exit;
  
      }else{
        echo json_encode(array('result'=>'failed'));
        exit;
      }
  
}

//Request Type End Here


//Request Status Start Here
if($_POST['type'] == "addrequeststatus"){ //if add submit

  $parsedData = array();

  $addData = $_POST['aData'];
  //print_r($addData);
  parse_str($addData,$parsedData);
  
  $requeststatusName = $parsedData['requeststatusName'];
  $requeststatusStatus = $parsedData['requeststatusStatus'];

  
  $check_query = mysqli_query($conn, "SELECT name from ".request_status." where name = '". $requeststatusName."'") or die("mysql Error Occured");

  if(mysqli_num_rows($check_query) > 0){

    echo json_encode(array('result'=>'same'));
    exit;

  }else{

    $query = "INSERT INTO ".request_status." (`name`,`status`) VALUES ('$requeststatusName','$requeststatusStatus')";
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

if($_POST['type'] == "updaterequeststatus"){
    $parsedData = array();
  
    $addData = $_POST['uData'];
    parse_str($addData,$parsedData);
     $requeststatusId = core_decrypt($parsedData['requeststatusId']);
     $requeststatusName = $parsedData['requeststatusName'];
     $requeststatusStatus = $parsedData['requeststatusStatus'];

    $requeststatus_details = "UPDATE ".request_status." SET `name` = '$requeststatusName' , `status` = '$requeststatusStatus' where `id` = '$requeststatusId'";
    mysqli_query($conn,$requeststatus_details) or die(mysqli_error($conn));
  
      if(mysqli_affected_rows($conn) > 0){
        echo json_encode(array('result'=>'success'));
        exit;
  
      }else{
        echo json_encode(array('result'=>'failed'));
        exit;
      }
  
}

//Request Status End Here


//Role Start Here
if($_POST['type'] == "addrole"){ //if add submit

  $parsedData = array();

  $addData = $_POST['aData'];
  //print_r($addData);
  parse_str($addData,$parsedData);
  
  $roleName = $parsedData['roleName'];
  $roleStatus = $parsedData['roleStatus'];

  
  $check_query = mysqli_query($conn, "SELECT name from ".roles." where name = '". $roleName."'") or die("mysql Error Occured");

  if(mysqli_num_rows($check_query) > 0){

    echo json_encode(array('result'=>'same'));
    exit;

  }else{

    $query = "INSERT INTO ".roles." (`name`,`status`) VALUES ('$roleName','$roleStatus')";
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

if($_POST['type'] == "updaterole"){
    $parsedData = array();
  
    $addData = $_POST['uData'];
    parse_str($addData,$parsedData);
     $roleId = core_decrypt($parsedData['roleId']);
     $roleName = $parsedData['roleName'];
     $roleStatus = $parsedData['roleStatus'];

    $role_details = "UPDATE ".roles." SET `name` = '$roleName' , `status` = '$roleStatus' where `id` = '$roleId'";
    mysqli_query($conn,$role_details) or die(mysqli_error($conn));
  
      if(mysqli_affected_rows($conn) > 0){
        echo json_encode(array('result'=>'success'));
        exit;
  
      }else{
        echo json_encode(array('result'=>'failed'));
        exit;
      }
  
}

//Role Status End Here

//Volunteer Start Here
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

//Volunteer Status End Here
?>