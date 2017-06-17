<?php
include('../config/session.php');
include("../config/connection.php");  
 

 $query_details = "SELECT * FROM `drivers` WHERE `email`='{$_SESSION['driver_email']}'";
 $result_details = mysqli_query($con, $query_details);
 while ($driver=mysqli_fetch_array($result_details)) {
    	$driverFname = $driver['firstname'];
    	$driverLname = $driver['lastname'];
          $driverEmail = $driver['email'];
          $driverPhone = $driver['phone'];
          $driverGender = $driver['gender'];
 }
?>