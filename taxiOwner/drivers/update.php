<?php
include("../../config/connection.php");
session_start();


if ($_POST) {
   $fname = $_POST['fname'];
   $lname = $_POST['lname'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $taxi = $_POST['taxi'];
   $id = $_POST['id'];

   $update_driver = "UPDATE `drivers` SET `firstname`='$fname',`lastname`='$lname',`email`='$email',`phone`='$phone',`taxi_plate`='$taxi' WHERE `id`= '$id' ";

   if(mysqli_query($con, $update_driver)){
       echo "updated";
   }else{
                        echo '<div class="alert alert-danger" role="alert">Something went wrong while Updating The Driver. Try again!!!</div>'.mysqli_error($con);       
   }
   
}