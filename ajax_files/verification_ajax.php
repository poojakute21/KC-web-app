<?php
//Duplication Start here

if($_POST['type'] == "updateDuplication"){
  
  $verificationId = core_decrypt($_POST['id']);
  if($_POST['status'] == 'Y'){
    $progressStatus = "4";
  }else{
    $progressStatus ="2";
  }
  
 
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
//Duplication End Here

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
  $isDuplicated = "N";
  if(mysqli_num_rows($check_query) > 0){
    $isDuplicated = "Y";
  }
   $query = "INSERT INTO ".request_details." (`document_id`, `channel_id`, `name`, `address`, 
   `contact_no`, `document_no`, `email`, `no_of_people`, `is_beneficiary`, `aid_form`,`is_duplicated`, 
   `request_type`,`created_at`)
    VALUES ('$documentType','$channelType','$fullName','$verificationAddress','$contactNumber',
    '$documentNumber','$emailAddress','$noofPeople','$isBeneficiary','$aidform','$isDuplicated','$requestType',
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

if($_POST['type'] == "updateverification"){
    $parsedData = array();
  print_r($_FILES);
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
    $request_type=$parsedData['requestType'];
  print_r($parsedData);
    $check_query = mysqli_query($conn, "SELECT name from ".request_details." where document_no = '". $documentNumber."'") or die("mysql Error Occured");
    $isDuplicated = "N";
    if(mysqli_num_rows($check_query) > 0){
      $isDuplicated = "Y";
      $progressStatus = "11";
    }
    if($request_type == 'bulk') {
      echo "<pre>";
      print_r($_FILES);
      echo "</pre>";
      exit;
      $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
      if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
      
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            // Skip the first line
            fgetcsv($csvFile);
            
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // Get row data
                $name   = $line[0];
                $email  = $line[1];
                $phone  = $line[2];
                $status = $line[3];
                
                // Check whether member already exists in the database with the same email
                $prevQuery = "SELECT id FROM members WHERE email = '".$line[1]."'";
                $prevResult = $db->query($prevQuery);
                
                if($prevResult->num_rows > 0){
                    // Update member data in the database
                    $db->query("UPDATE members SET name = '".$name."', phone = '".$phone."', status = '".$status."', modified = NOW() WHERE email = '".$email."'");
                }else{
                    // Insert member data in the database
                    $db->query("INSERT INTO members (name, email, phone, created, modified, status) VALUES ('".$name."', '".$email."', '".$phone."', NOW(), NOW(), '".$status."')");
                }
            }
            
            // Close opened CSV file
            fclose($csvFile);
            
            $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
      }else{
          $qstring = '?status=invalid_file';
      }
    }
    exit;
    $role_details = "UPDATE ".request_details." SET document_id='".$documentType."',name='".$fullName."',address='".$verificationAddress."',contact_no='".$contactNumber."',document_no='".$documentNumber."',
    email='".$emailAddress."',no_of_people='".$noofPeople."',is_beneficiary='".$isBeneficiary."',
    aid_form='".$aidform."',is_duplicated='".$isDuplicated."', updated_at='now()' where `id` = '".$verificationId."'";
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

 
 $query_details = "UPDATE ".request_details_delivery." SET delivered_to='".$deliveredtoName."',delivery_location='".$deliveredLocation."',
 delivered_to_contact='".$deliveredtoContact."',delivered_by='".$deliveredBy."',request_status_id='".$progressStatus."',
 delivered_by_contact='".$deliveredbyContact."',delivered_on='".$deliveredOn."',delivery_remark='".$remarks."',
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