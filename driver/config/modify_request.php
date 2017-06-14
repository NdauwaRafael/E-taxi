<?php
include("../../config/connection.php");  
if ($_POST) {
    $id = $_POST['id'];
    $status = $_POST['status'];


$modify = "UPDATE `request` SET `responded_at`=CURRENT_TIMESTAMP,`status`='$status' WHERE `id`='$id'";

if (mysqli_query($con, $modify)) {

if ($status=='Accepted') {
         echo "Accepted";
    } else{
       echo "Declined";
    }   
     
}

    
}

?>