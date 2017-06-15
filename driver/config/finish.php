<?php
include("../../config/connection.php");  
if ($_POST) {
    $idd = $_POST['idd'];
    $amount = $_POST['amount'];


$modify = "UPDATE `request` SET `status`='Finished',`amount_charged`='$amount' WHERE `id`='$idd' ";

if (mysqli_query($con, $modify)) {

   echo "Job Finished";
}

    
}

?>