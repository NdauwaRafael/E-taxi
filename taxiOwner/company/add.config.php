<?php
session_start();
include("../../config/connection.php");   
   if ($_POST) {
       $name = $_POST['cname'];
       $location = $_POST['location'];
       $Description = $_POST['description'];
       $owner = $_SESSION['owner_email'];
     

$check = "SELECT * FROM `company` WHERE `owner`='{$_SESSION['owner_email']}'";
$check_result = mysqli_query($con, $check);
if(mysqli_num_rows($check_result)>0){
     echo '<div class="alert alert-warning" role="alert">You Can Not Add More Than One Company. E-taxi Restricts Taxi OWNERS tO Register Their Taxis Under Different Companies For Spamming Reasons</div>';
}else {

   $exist = "SELECT * FROM `company` WHERE `name`='$name'";
   $exist_result = mysqli_query($con, $exist);
   if(mysqli_num_rows($exist_result)>0){
          echo '<div class="alert alert-warning" role="alert">Error!! A Company Name confilict exist <strong>'.$name.'!!</strong> Name Is Already Registered To The System, Contact info@e-tax.com to resolve this issue.</div>';
   } else{


        $companay = "INSERT INTO `company`(`id`, `name`, `location`, `description`, `owner`) VALUES (NULL,'$name','$location','$Description','$owner')";

        if(mysqli_query($con, $companay)){
            echo "added";
        }else{
            echo '<div class="alert alert-danger" role="alert">An Error Occured While Adding This Company. Please Review Your Details And Try Again</div>'.mysqli_error($con);
        }
   }

}


   }
?>