<?php
if(isset($_POST['whatsappFileSubmit'])){
     $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
     $newURL = WEBSITE . "main.php?page=verifications/verifications"; 
     // Validate whether selected file is a CSV file
    if(!empty($_FILES['whatsappFile']['name']) && in_array($_FILES['whatsappFile']['type'], $csvMimes)){
        // If the file is uploaded
        if(is_uploaded_file($_FILES['whatsappFile']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['whatsappFile']['tmp_name'], 'r');
            
            // Skip the first data
            fgetcsv($csvFile);
            
            // Parse data from CSV file data by data
            while(($data = fgetcsv($csvFile)) !== FALSE){
                $fullName = $data[1];
                $verificationAddress = $data[2];
                $emailAddress = $data[5];
                $contactNumber = $data[3];
                $channelType = "1";
                $documentType = $data[0];
                $documentNumber = $data[4];
                $noofPeople = $data[6];
                $isBeneficiary = $data[7];
                $aidform = $data[8];
                
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
                    $progressStatus = "11";
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
                           
               
                }
                if(mysqli_affected_rows($conn) > 0){
                     ?>
                     <script>
                        alert('File Uploaded Successfully');
                    </script>
                <?php
                header('Location: '.$newURL);
                }else{ ?>
                <script>
                    swal("Something went wrong","Details Already Exists.","error");
                    window.location = WEBSITE + "main.php?page=verifications/verifications";
                </script>
                <?php
                    }   
            
        
        }else{ ?>
           <script>
                    swal("Something went wrong","Details Already Exists.","error");
                    window.location = WEBSITE + "main.php?page=verifications/verifications";
                </script>
                
        <?php
        }
    }else{ ?>
    <script>
                    swal("Something went wrong","Details Already Exists.","error");
                    window.location = WEBSITE + "main.php?page=verifications/verifications";
                </script>
    <?php    
    }
}


?>